<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= esc($title ?? 'Chat') ?></title>
	<style>
		body { font-family: Arial, sans-serif; margin: 0; background: #f6f7fb; }
		.header { background: #1f2937; color: #fff; padding: 12px 16px; display:flex; justify-content:space-between; align-items:center; }
		.container { max-width: 960px; margin: 16px auto; background:#fff; border:1px solid #e5e7eb; border-radius:8px; overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,0.05); }
		.messages { height: 480px; overflow-y: auto; padding: 16px; background:#fafafa; }
		.message { margin-bottom: 12px; }
		.meta { color:#6b7280; font-size: 12px; }
		.msg-bubble { display:inline-block; padding:8px 12px; border-radius:8px; background:#e5e7eb; }
		.msg-admin { background:#dbeafe; }
		.msg-staff { background:#dcfce7; }
		.input-bar { display:flex; gap:8px; padding:12px; border-top:1px solid #e5e7eb; }
		.input-bar input { flex:1; padding:10px; border:1px solid #d1d5db; border-radius:6px; }
		.input-bar button { padding:10px 14px; border:none; background:#2563eb; color:#fff; border-radius:6px; cursor:pointer; }
		.input-bar button:disabled { background:#93c5fd; cursor:not-allowed; }
	</style>
</head>
<body>
	<div class="header">
		<div><strong>Support Chat</strong></div>
		<div>
			<?php $backUrl = (isset($role) && strtolower($role) === 'admin') ? site_url('admin/dashboard') : site_url('staff/dashboard'); ?>
			<a href="<?= $backUrl ?>" style="color:#93c5fd; text-decoration:none; margin-right:12px;">⟵</a>
			<?= esc($username ?? '') ?> (<?= esc($role ?? '') ?>)
		</div>
	</div>
	<div class="container">
		<div id="messages" class="messages"></div>
		<form id="chatForm" class="input-bar">
			<input id="messageInput" type="text" placeholder="Type a message..." autocomplete="off" />
			<button id="sendBtn" type="submit">Send</button>
		</form>
	</div>

	<script>
	(function() {
		const messagesEl = document.getElementById('messages');
		const form = document.getElementById('chatForm');
		const input = document.getElementById('messageInput');
		const sendBtn = document.getElementById('sendBtn');
		const messagesUrl = <?= json_encode($messagesUrl ?? '') ?>;
		const sendUrl = <?= json_encode($sendUrl ?? '') ?>;
		let lastId = 0;
		let pollingTimer = null;

		function renderMessage(msg) {
			const role = (msg.user_role || '').toLowerCase();
			const bubbleClass = role === 'admin' ? 'msg-bubble msg-admin' : 'msg-bubble msg-staff';
			const wrapper = document.createElement('div');
			wrapper.className = 'message';
			wrapper.innerHTML = `<div class="meta">${msg.username} • ${msg.user_role}</div>
			<div class="${bubbleClass}">${msg.message.replace(/</g, '&lt;')}</div>`;
			messagesEl.appendChild(wrapper);
			messagesEl.scrollTop = messagesEl.scrollHeight;
		}

		async function fetchMessages() {
			try {
				const res = await fetch((messagesUrl || '/chat/messages') + '?lastId=' + encodeURIComponent(lastId), { headers: { 'Accept': 'application/json' } });
				if (!res.ok) return;
				const data = await res.json();
				if (data && data.success && Array.isArray(data.messages)) {
					for (const m of data.messages) {
						renderMessage(m);
						lastId = Math.max(lastId, Number(m.id));
					}
				}
			} catch (e) {
				// silent retry
			}
		}

		function startPolling() {
			if (pollingTimer) return;
			pollingTimer = setInterval(function(){ fetchMessages(); }, 1000);
			fetchMessages();
		}

		form.addEventListener('submit', async function(e) {
			e.preventDefault();
			const text = input.value.trim();
			if (!text) return;
			sendBtn.disabled = true;
			try {
				const res = await fetch(sendUrl || '/chat/send', {
					method: 'POST',
					headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'Accept': 'application/json' },
					body: new URLSearchParams({ message: text })
				});
				const data = await res.json();
				if (data && data.success && data.message) {
					renderMessage(data.message);
					lastId = Math.max(lastId, Number(data.message.id));
					input.value = '';
					input.focus();
				}
			} catch (e) {
				// ignore
			} finally {
				sendBtn.disabled = false;
			}
		});

		document.addEventListener('visibilitychange', function() {
			if (document.hidden) {
				if (pollingTimer) { clearInterval(pollingTimer); pollingTimer = null; }
			} else {
				startPolling();
			}
		});

		startPolling();
	})();
	</script>
</body>
</html>
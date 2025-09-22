<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Update Order #<?= esc($order['id']) ?> Status</h2>

<form method="post" action="<?= site_url('staff/orders/' . $order['id'] . '/status') ?>">
    <div class="mb-3">
        <label class="form-label">Current Status</label>
        <input type="text" class="form-control" value="<?= esc($order['status']) ?>" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">New Status</label>
        <select name="status" class="form-select" required>
            <?php foreach ($statuses as $s): ?>
                <option value="<?= esc($s) ?>" <?= $s === $order['status'] ? 'selected' : '' ?>><?= esc(ucfirst($s)) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Note (optional)</label>
        <textarea name="note" class="form-control" rows="3" placeholder="Add a note..."></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="<?= site_url('staff/orders') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>

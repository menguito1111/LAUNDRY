<?php

namespace App\Controllers;

use App\Models\ChatMessageModel;

class ChatController extends BaseController
{
    public function index()
    {
        $session = session();
        $role = $session->get('role');
        if (!in_array($role, ['admin', 'staff'], true)) {
            return redirect()->to('/');
        }

        return view('chat/index', [
            'title' => 'Support Chat',
            'role' => $role,
            'username' => $session->get('username'),
            'sendUrl' => site_url('chat/send'),
            'messagesUrl' => site_url('chat/messages')
        ]);
    }
    
    public function sendMessage()
    {
        $messageModel = new ChatMessageModel();
        $userId = session()->get('id');
        $userRole = session()->get('role');

        if (!in_array($userRole, ['admin', 'staff'], true)) {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'error' => 'Forbidden']);
        }
        $message = $this->request->getPost('message');
        
        if (empty(trim($message))) {
            return $this->response->setJSON(['success' => false, 'error' => 'Message cannot be empty']);
        }
        
        $data = [
            'user_id' => $userId,
            'user_role' => $userRole,
            'message' => trim($message),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        if ($messageModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => [
                    'id' => $messageModel->getInsertID(),
                    'user_id' => $userId,
                    'user_role' => $userRole,
                    'username' => session()->get('username'),
                    'message' => $data['message'],
                    'created_at' => $data['created_at']
                ]
            ]);
        }
        
        return $this->response->setJSON([
            'success' => false,
            'error' => 'Failed to send message',
            'details' => $messageModel->errors() ?: $messageModel->db->error()
        ]);
    }
    
    public function getMessages()
    {
        $messageModel = new ChatMessageModel();
        $session = session();
        $role = $session->get('role');
        if (!in_array($role, ['admin', 'staff'], true)) {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'error' => 'Forbidden']);
        }

        $lastId = $this->request->getGet('lastId') ?? 0;
        
        $messages = $messageModel->select('chat_messages.*, users.username')
                                ->join('users', 'users.id = chat_messages.user_id')
                                ->where('chat_messages.id >', $lastId)
                                ->orderBy('chat_messages.created_at', 'ASC')
                                ->limit(50)
                                ->findAll();
        
        return $this->response->setJSON([
            'success' => true,
            'messages' => $messages
        ]);
    }
}
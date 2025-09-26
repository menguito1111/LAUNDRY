<?php

namespace App\Controllers;

use App\Models\ChatMessageModel;

class ChatController extends BaseController
{
    public function index()
    {
        return view('chat/index', [
            'title' => 'Support Chat'
        ]);
    }
    
    public function sendMessage()
    {
        $messageModel = new ChatMessageModel();
        $userId = session()->get('id');
        $userRole = session()->get('role');
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
        
        return $this->response->setJSON(['success' => false, 'error' => 'Failed to send message']);
    }
    
    public function getMessages()
    {
        $messageModel = new ChatMessageModel();
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
<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatMessageModel extends Model
{
    protected $table = 'chat_messages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'user_role', 'message', 'created_at'];
    protected $useTimestamps = false;
}
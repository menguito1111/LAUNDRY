<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderStatusHistoryModel extends Model
{
    protected $table = 'order_status_history';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'changed_by', 'old_status', 'new_status', 'note', 'created_at'];
    protected $useTimestamps = false;
}

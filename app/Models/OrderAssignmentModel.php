<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderAssignmentModel extends Model
{
    protected $table = 'order_assignments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'staff_id', 'assigned_at', 'active', 'created_at'];
    protected $useTimestamps = false;
}

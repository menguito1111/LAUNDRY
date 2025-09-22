<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffIssueModel extends Model
{
    protected $table = 'staff_issues';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'reported_by', 'category', 'description', 'status', 'created_at', 'resolved_at'];
    protected $useTimestamps = false;
}

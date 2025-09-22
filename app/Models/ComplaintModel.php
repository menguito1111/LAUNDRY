<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintModel extends Model
{
    protected $table = 'complaints';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id','user_id','description','status','created_at'];
    protected $useTimestamps = false;
}

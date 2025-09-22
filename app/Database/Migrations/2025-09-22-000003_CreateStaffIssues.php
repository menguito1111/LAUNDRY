<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStaffIssues extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT','unsigned' => true,'auto_increment' => true],
            'order_id'    => ['type' => 'INT','unsigned' => true,'null' => true],
            'reported_by' => ['type' => 'INT','unsigned' => true],
            'category'    => ['type' => 'ENUM','constraint' => ['machine','order','customer','other'],'default' => 'other'],
            'description' => ['type' => 'TEXT'],
            'status'      => ['type' => 'ENUM','constraint' => ['open','in_progress','resolved'],'default' => 'open'],
            'created_at'  => ['type' => 'DATETIME','null' => true],
            'resolved_at' => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id','orders','id','SET NULL','CASCADE');
        $this->forge->addForeignKey('reported_by','users','id','CASCADE','CASCADE');
        $this->forge->createTable('staff_issues');
    }

    public function down()
    {
        $this->forge->dropTable('staff_issues');
    }
}

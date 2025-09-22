<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderAssignments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT','unsigned' => true,'auto_increment' => true],
            'order_id'    => ['type' => 'INT','unsigned' => true],
            'staff_id'    => ['type' => 'INT','unsigned' => true],
            'assigned_at' => ['type' => 'DATETIME','null' => true],
            'active'      => ['type' => 'TINYINT','constraint' => 1,'default' => 1],
            'created_at'  => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['order_id','staff_id']);
        $this->forge->addForeignKey('order_id','orders','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('staff_id','users','id','CASCADE','CASCADE');
        $this->forge->createTable('order_assignments');
    }

    public function down()
    {
        $this->forge->dropTable('order_assignments');
    }
}

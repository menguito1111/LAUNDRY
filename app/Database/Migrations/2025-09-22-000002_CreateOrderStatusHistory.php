<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderStatusHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT','unsigned' => true,'auto_increment' => true],
            'order_id'    => ['type' => 'INT','unsigned' => true],
            'changed_by'  => ['type' => 'INT','unsigned' => true], // user (likely staff) who changed
            'old_status'  => ['type' => 'ENUM','constraint' => ['pending','washing','ready','delivered'],'null' => true],
            'new_status'  => ['type' => 'ENUM','constraint' => ['pending','washing','ready','delivered']],
            'note'        => ['type' => 'VARCHAR','constraint' => 255,'null' => true],
            'created_at'  => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('order_id');
        $this->forge->addForeignKey('order_id','orders','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('changed_by','users','id','CASCADE','CASCADE');
        $this->forge->createTable('order_status_history');
    }

    public function down()
    {
        $this->forge->dropTable('order_status_history');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateComplaints extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT','unsigned' => true,'auto_increment' => true],
            'order_id'   => ['type' => 'INT','unsigned' => true],
            'user_id'    => ['type' => 'INT','unsigned' => true],
            'description'=> ['type' => 'TEXT'],
            'status'     => ['type' => 'ENUM','constraint' => ['open','resolved'],'default' => 'open'],
            'created_at' => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id','orders','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
        $this->forge->createTable('complaints');
    }

    public function down()
    {
        $this->forge->dropTable('complaints');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatMessages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT','unsigned' => true,'auto_increment' => true],
            'user_id'     => ['type' => 'INT','unsigned' => true],
            'user_role'   => ['type' => 'ENUM','constraint' => ['admin','staff','customer']],
            'message'     => ['type' => 'TEXT'],
            'created_at'  => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('created_at');
        $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
        $this->forge->createTable('chat_messages');
    }

    public function down()
    {
        $this->forge->dropTable('chat_messages');
    }
}
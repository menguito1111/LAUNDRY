<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInventory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT','unsigned' => true,'auto_increment' => true],
            'item_name'  => ['type' => 'VARCHAR','constraint' => 150],
            'quantity'   => ['type' => 'INT','unsigned' => true],
            'created_at' => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inventory');
    }

    public function down()
    {
        $this->forge->dropTable('inventory');
    }
}

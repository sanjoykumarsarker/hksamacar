<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MessageMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'sender_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'receiver_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'body'        => ['type' => 'text', 'null' => 0],
            'active'      => ['type' => 'tinyint', 'constraint' => 1, 'default' => 0],
            'created_at'  => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['sender_id', 'receiver_id']);
        $this->forge->createTable('messages', true);
    }

    public function down()
    {
        $this->forge->dropTable('messages', true);
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifications extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'text'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => 0],
            'link'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => 1],
            'type'       => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => 1, 'default' => 'success'],
            'status'     => ['type' => 'tinyint', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('notifications', true);
    }

    public function down()
    {
        $this->forge->dropTable('notifications', true);
    }
}

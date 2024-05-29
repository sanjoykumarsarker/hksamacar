<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true],
            'name'     => [
                'type' => 'VARCHAR', 'constraint' => 150, 'null' => 1,
            ],
            'email'    => [
                'type' => 'VARCHAR', 'constraint' => 150, 'null' => 0,
            ],
            'password' => [
                'type' => 'VARCHAR', 'constraint' => 150, 'null' => 0,
            ],
            'active'   => [
                'type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0
            ],
            'ban'      => ['type' => 'DATETIME', 'null' => true],
            'image'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'verified' => [
                'type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0
            ],
            'verification' => [
                'type' => 'VARCHAR', 'constraint' => 150, 'null' => true,
            ],
            'expires_at' => ['type' => 'DATETIME', 'null' => true],
            'role' => [
                'type' => 'VARCHAR', 'constraint' => 10, 'default' => 'user'
            ],
            'role_id' => [
                'type' => 'INT', 'unsigned' => true, 'null' => true
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            // 'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}

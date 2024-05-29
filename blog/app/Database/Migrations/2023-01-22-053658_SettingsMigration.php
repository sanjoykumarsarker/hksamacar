<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SettingsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => true
            ],
            'value' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 1
            ],
            'active' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => false,
                'default' => true
            ],
            'group' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
                'default' => 'text'
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('settings', true);
    }
}

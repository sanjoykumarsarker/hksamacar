<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MediaMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false
            ],
            'alt' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
                'default' => 'image'
            ],
            'group' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'active' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => false,
                'default' => 1
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('media', true);
    }

    public function down()
    {
        $this->forge->dropTable('media', true);
    }
}

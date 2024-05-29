<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PageMigration extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => 0
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => 0
            ],
            'body' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'active' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => 0,
                'default' => 1
            ],
            'fullpage' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => 0,
                'default' => 0
            ],
            'comment_active' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => 0,
                'default' => 1
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pages', true);
    }

    public function down()
    {
        $this->forge->dropTable('pages', true);
    }
}

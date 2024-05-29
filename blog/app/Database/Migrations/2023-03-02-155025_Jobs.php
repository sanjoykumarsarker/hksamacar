<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jobs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 45
            ],
            'payload' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'JSON payload'
            ],
            'response' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'default' => 'queued',
                'constraint' => 100,
                'null' => false
            ],
            'run_time' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jobs', true);
    }

    public function down()
    {
        $this->forge->dropTable('jobs', true);
    }
}

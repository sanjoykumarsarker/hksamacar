<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EpaperMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'media_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true
            ],
            'issue_no' => [
                'type' => 'INT',
                'constraint' => 4,
                'null' => false,
                'unsigned' => true,
            ],
            'issue' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'body' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'active' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => false,
                'default' => 1
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
                'default' => 'pdf'
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('issue_no');
        $this->forge->createTable('epapers', true);
    }

    public function down()
    {
        $this->forge->dropTable('epapers', true);
    }
}

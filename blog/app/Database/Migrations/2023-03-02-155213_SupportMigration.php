<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SupportMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'title'      => ['type' => 'varchar', 'constraint' => 255, 'null' => 0],
            'body'       => ['type' => 'text', 'null' => 0],
            'active'     => ['type' => 'tinyint', 'constraint' => 1, 'default' => 0],
            'type'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('user_id');
        $this->forge->createTable('supports', true);
    }

    public function down()
    {
        $this->forge->dropTable('supports', true);
    }
}

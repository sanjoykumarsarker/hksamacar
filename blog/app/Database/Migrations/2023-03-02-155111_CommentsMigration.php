<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommentsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'parent_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'post_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'body'       => ['type' => 'text', 'null' => 0],
            'active'     => ['type' => 'tinyint', 'constraint' => 1, 'default' => 0],
            'status'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('post_id', 'posts', 'id', '', 'CASCADE');
        $this->forge->createTable('comments', true);
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('comments', true);
        $this->db->enableForeignKeyChecks();
    }
}

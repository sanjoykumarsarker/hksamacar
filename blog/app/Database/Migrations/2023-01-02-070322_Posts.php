<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
            'media_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => 1
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => 1
            ],
            'tags' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => 1
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => 1
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
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'published'
            ],
            'comment_active' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => 0,
                'default' => 1
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP'
            // 'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        // $this->forge->addForeignKey('users_id', 'users', 'id', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('user_id', 'users', 'id');
        // $this->forge->addForeignKey('category_id', 'categories', 'id');
        // $this->forge->addForeignKey('media_id', 'media', 'id');
        $this->forge->createTable('posts', true);
    }

    public function down()
    {
        // $this->forge->dropForeignKey('posts', 'users_foreign');
        $this->forge->dropTable('posts', true);
    }
}

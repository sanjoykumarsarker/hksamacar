<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LoginAttempts extends Migration
{
    public function up()
    {
        // $ipAddress = $request->getIPAddress();
        // $userAgent = (string) $request->getUserAgent();
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255],
            'user_agent' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_type'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Only for successful logins
            'success'    => ['type' => 'tinyint', 'constraint' => 1],
            'created_at' => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('login_attempts', true);
    }

    public function down()
    {
        $this->forge->dropTable('login_attempts', true);
    }
}

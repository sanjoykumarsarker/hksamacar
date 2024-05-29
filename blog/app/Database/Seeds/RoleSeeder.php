<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'super-admin'],
            ['name' => 'admin'],
            ['name' => 'user'],
            ['name' => 'reviewer'],
        ];
        $this->db->table('roles')->insertBatch($data);
    }
}

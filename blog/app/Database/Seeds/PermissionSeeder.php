<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $names = ['post', 'epaper', 'category', 'page', 'user', 'role', 'settings'];
        $data = [];
        foreach ($names as $name) {
            foreach (['view', 'add', 'update', 'delete'] as $key) {
                $permission = $key . '_' . $name;
                $data[] = ['name' => $permission];
            }
        }

        $this->db->table('permissions')->insertBatch($data);
    }
}

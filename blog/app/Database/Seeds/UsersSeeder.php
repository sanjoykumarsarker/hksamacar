<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email'    => 'admin@hksamacar.com',
            'active'    => 1,
            'verified'    => 1,
            'role'    => 'admin',
            'role_id'    => 2,
            'password'    => password_hash('hksamacar', PASSWORD_DEFAULT),
        ];
        $this->db->table('users')->insert($data);

        $data1 = [
            'name' => 'hksamacar',
            'email'    => 'hksamacar@gmail.com',
            'active'    => 1,
            'verified'    => 1,
            'role_id'    => 2,
            'password'    => password_hash('hksamacar', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($data1);
    }
}

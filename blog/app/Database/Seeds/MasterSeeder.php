<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $this->call('SettingsSeeder');
        $this->call('UsersSeeder');
        $this->call('CategorySeeder');
        $this->call('PageSeeder');
        $this->call('RoleSeeder');
        $this->call('PermissionSeeder');
        $this->call('RolePermissionSeeder');
        // $this->call('PostSeeder');
        // $this->call('MediaSeeder');
        // $this->call('EpaperSeeder');
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $roles = [2, 3, 4];
        $data = [];
        // $permissions = model('PermissionModel')
        //     ->like('name', 'post', 'before')
        //     ->orLike('name', 'category', 'before')
        //     ->select('id')->findAll();
        $permissions = model('PermissionModel')
            ->select('id')->findAll();
        foreach ($permissions as $permission) {
            $data[] = ['role_id' => 1, 'permission_id' => (int) $permission['id']];
            // $this->db->table('role_permissions')->insert($data);
        }
        // dd($data);
        // $db = \Config\Database::connect();
        // $builder = $db->table('role_permissions');
        // $query   = $builder->where('role_permissions.role_id', 3)
        //     ->join('permissions p', 'p.id = role_permissions.permission_id')
        //     ->select('p.name')->get();
        // $perms = [];
        // foreach ($query->getResult() as $row) {
        //     $perms[] = $row->name;
        // }
        // print_r($perms);
        $this->db->table('role_permissions')->insertBatch($data);
    }
}

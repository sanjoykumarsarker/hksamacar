<?php

namespace App\Models;

use App\Traits\Active;
use CodeIgniter\Model;

class RoleModel extends Model
{
    use Active;
    protected $DBGroup          = 'default';
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'active', 'description'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['update_cache'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['update_cache'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['update_cache'];

    protected function update_cache()
    {
        $cache = \Config\Services::cache();
        $cache->delete('active_roles');
    }

    public function all($id = null, $key = 'name')
    {
        $cache = \Config\Services::cache();
        $roles = $cache->remember('active_roles', 24 * 7 * 60 * 60, function () {
            return $this->active()->select('id,name,description')->findAll();
        });
        if ($id) {
            $role = array_filter($roles, function ($role) use ($id) {
                return $role['id'] === $id;
            });

            return end($role) ? end($role)[$key] : NULL;
        }
        return $roles;
    }
}

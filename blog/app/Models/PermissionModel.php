<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'permissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'description'
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
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function clean_cache()
    {
        $cache = \Config\Services::cache();
        $cache->delete('permissions');
    }

    public function all($id = null, $key = 'name')
    {
        $cache = \Config\Services::cache();
        $permissions = $cache->remember('permissions', 24 * 7 * 60 * 60, function () {
            return $this->select('id,name')->findAll();
        });
        if ($id) {
            $permission = array_filter($permissions, function ($permission) use ($id) {
                return $permission['id'] === $id;
            });

            return end($permission) ? end($permission)[$key] : NULL;
        }
        return $permissions;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'email', 'password', 'active',
        'verified', 'verification', 'role', 'role_id',
        'ban', 'image', 'status', 'created_at', 'updated_at',
        'google_id', 'expires_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name' => 'required',
        'email' => 'required|valid_email',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $ADMIN = 'admin';
    protected $HOME = '/admin/dashboard';

    public function permissions(int $role): array
    {
        if (!$role) return [];
        $result = model('RolePermissionsModel')
            ->where('role_permissions.role_id', $role)
            ->join('permissions p', 'p.id = role_permissions.permission_id')
            ->select('p.name')
            ->findAll();

        $permissions = array_map(function ($permission) {
            return $permission['name'];
        }, $result);

        return $permissions;
    }

    public function withPermissions()
    {
        $this->builder()
            ->select('users.*, p.name as p_name')
            ->join('role_permissions rp', 'rp.role_id=users.role_id')
            ->join('permissions p', 'p.id = rp.permission_id');
        return $this;
    }

    public function attachPermission($user)
    {
        $user['permissions'] = $this->permissions($user['role_id']);
        return $user;
    }

    protected $PROFILE_FOLDER = 'blogassets/uploads/profile/';


    public function makeFilename(string $name): string
    {
        helper('text');
        return model('Post')->cleanURL($name) . '-' . random_string('alpha');
    }

    public function downloadGoogleImage(string $imageUrl, string $filename)
    {
        $name = $filename . '.jpg';
        // if (!is_dir($this->PROFILE_FOLDER)) {
        //     mkdir($this->PROFILE_FOLDER, 0777, true);
        // }
        file_put_contents($this->PROFILE_FOLDER . $name, file_get_contents($imageUrl));
        return $name;
    }

    public function updateGoogle(array $user, array $data)
    {
        $data_to_update = [];

        if (is_null($user['google_id'])) {
            $data_to_update['google_id'] =  $data['google_id'];
        }

        if (is_null($user['image'])) {
            $image = $this->downloadGoogleImage($data['image'], $this->makeFilename($user['name']));
            $data_to_update['image'] =  $image;
        }

        if (!empty($data_to_update)) {
            return $this->update($user['id'], $data_to_update);
        }

        return false;
    }
}

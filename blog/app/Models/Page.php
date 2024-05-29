<?php

namespace App\Models;

use App\Traits\Active;
use CodeIgniter\Model;

class Page extends Model
{
    use Active;
    protected $DBGroup          = 'default';
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'body', 'user_id', 'slug', 'fullpage',
        'active', 'comment_active', 'created_at', 'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
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
    protected $beforeInsert   = ['slugify'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['slugify'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function slugify($data)
    {
        if (!isset($data['data']['slug'])) {
            return $data;
        }
        $text = $data['data']['slug'];
        $data['data']['slug'] = mb_strtolower(preg_replace('/[\-\s]+/u', "-", trim(preg_replace('/[ ,.@#$%^&*()_\/=]+/', ' ', $text))));
        return $data;
    }
}

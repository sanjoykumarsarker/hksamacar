<?php

namespace App\Models;

use App\Traits\Active;
use CodeIgniter\Model;

class Category extends Model
{
    use Active;
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'active', 'created_at'
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

    protected function update_cache()
    {
        $cache = \Config\Services::cache();
        $cache->delete('categories_count');
    }

    public function trending($num = 5)
    {
        $cache = \Config\Services::cache();
        return $cache->remember('categories_count', 24 * 7 * 60 * 60, function () use ($num) {
            return $this->select('categories.id,categories.name,COUNT(posts.id) as total_posts')
                ->join('posts', 'posts.category_id=categories.id')
                ->groupBy('name')
                ->orderBy('total_posts')
                ->limit($num)
                ->find();
        });
    }
}

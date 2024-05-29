<?php

namespace App\Models;

use App\Traits\Active;
use CodeIgniter\Model;

class SettingsModel extends Model
{
    use Active;
    protected $DBGroup          = 'default';
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'key', 'value', 'active', 'note', 'group'
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
    protected $afterInsert    = ['clean_cache'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['clean_cache'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function all()
    {
        $cache = \Config\Services::cache();
        $settings = $this;
        $cached_settings = $cache->remember('settings_all', 30 * 24 * 60 * 60, function () use ($settings) {
            $settings_array = $settings->findAll();
            $mapped_settings = array_map(function ($setting) {
                $obj = (object) ['value' => $setting['value'], 'active' => $setting['active']];
                return [$setting['key'] => $obj];
            }, $settings_array);
            return array_merge(...$mapped_settings);
        });
        return $cached_settings;
    }

    public function clean_cache()
    {
        $cache = \Config\Services::cache();
        $cache->deleteMatching('settings_*');
    }
}

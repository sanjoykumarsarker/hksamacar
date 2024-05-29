<?php

namespace App\Models;

use App\Entities\Media as AppMedia;
use CodeIgniter\Model;

class Media extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'media';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    // protected $returnType       = 'array';
    protected $returnType       = AppMedia::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'name', 'alt',
        'location', 'type',
        'group', 'active'
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
    protected $beforeDelete   = ['deleteMedia'];
    protected $afterDelete    = [];

    public function deleteMedia($params)
    {
        $id = end($params['id']);
        $media = $this->asArray()->find($id);
        $path = $media['location'] . $media['name'];
        $pathinfo = pathinfo($media['name']);
        foreach (['-small', '-thumb'] as $size) {
            $path2 = $media['location'] . $pathinfo['filename'] . $size . '.' . $pathinfo['extension'];
            $this->unlinkIfExists($path2);
        }
        $this->unlinkIfExists($path);
    }

    public function unlinkIfExists($filename)
    {
        if (file_exists($filename)) {
            unlink($filename);
        }
    }

    protected $imageBodyLocation = 'blogassets/uploads/body/';
}

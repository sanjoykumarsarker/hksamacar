<?php

namespace App\Models;

use App\Entities\Epaper;
use App\Traits\Active;
// use App\Traits\Relationship;
use CodeIgniter\Model;

class EpaperModel extends Model
{
    use Active;
    protected $DBGroup          = 'default';
    protected $table            = 'epapers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Epaper::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'issue_no', 'issue', 'body',
        'type', 'active', 'created_at', 'media_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

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

    protected $imageLocation = 'blogassets/uploads/paper/';
    protected $pdfLocation = 'blogassets/uploads/pdf/';

    public function addAssetsUrl($media)
    {
        $media = $this->attributes['media'];

        if ($this->attributes['type'] === 'pdf') {
            return base_url(model('EpaperModel')->pdfLocation . $media->name);
        }

        if (is_array($media)) {
            foreach ($media as $image) {
                $image->url = base_url(model('EpaperModel')->pdfLocation . $media->name);
            }
            return $media;
        }
    }
}

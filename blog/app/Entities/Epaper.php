<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Epaper extends Entity
{
    use \App\Traits\Relationship;
    protected $datamap = [];
    protected $dates   = ['created_at'];
    protected $casts   = ['active' => 'boolean'];

    public function getUrl()
    {
        return base_url('epaper') . '?issue=' . $this->issue_no;
    }

    public function getMediaUrl()
    {
        $media = $this->attributes['media'];

        if (is_array($media)) {
            foreach ($media as $image) {
                $image->url = base_url(model('EpaperModel')->imageLocation . $image->name);
            }
            return $media;
        } else {
            return  base_url(model('EpaperModel')->pdfLocation . $media->name);
        }
    }
}

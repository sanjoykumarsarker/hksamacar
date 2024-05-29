<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Media extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at'];
    protected $casts   = ['active' => 'boolean'];

    // public function getUrl()
    // {
    //     return base_url('assets/' . $this->attributes['location'] . '/' . $this->attributes['name']);
    // }
}

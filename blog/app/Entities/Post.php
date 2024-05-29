<?php

namespace App\Entities;

// use App\Models\User;
// use App\Traits\Relationship;

use App\Libraries\BanglaDate;
use App\Models\Post as AppPost;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Post extends Entity
{
    // use Relationship;
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'tags' => 'csv',
        'active' => 'boolean',
        'comment_active' => 'boolean'
    ];

    public function getPostedAt()
    {
        $myTime = new Time('-1 week');
        return $this->created_at->isBefore($myTime) ?
            BanglaDate::trans($this->created_at->format('F d, Y - h:i A'))
            : $this->created_at->humanize();
    }

    public function getUrl()
    {
        return base_url('news') . '/' . $this->slug;
    }

    public function getMediaUrl()
    {
        if (!array_key_exists('image', $this->attributes)) return null;
        $name =  $this->attributes['image'];
        return base_url((new AppPost)->withLocation($name));
    }

    // Size: 320x260; Larger than Small
    public function getMediaThumbUrl()
    {
        if (!array_key_exists('image', $this->attributes)) return null;
        $name =  $this->attributes['image'];
        $file =  base_url((new AppPost)->withLocation($name, 'thumb'));
        return file_exists($file) ? $file : $this->getMediaUrl();
    }

    // Size: 90x70; Smaller than thumbnail
    public function getMediaSmallUrl()
    {
        // $name =  $this->attributes['image'];
        // return base_url((new AppPost)->withLocation($name, 'small'));
        $file =  base_url((new AppPost)->withLocation($this->attributes['image'], 'small'));
        return file_exists($file) ? $file : $this->getMediaUrl();
    }

    // public function user()
    // {
    //     // return get_parent_class(__CLASS__);
    //     return $this->belongsTo(\App\Models\User::class);
    // }
}

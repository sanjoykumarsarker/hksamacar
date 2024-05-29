<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Entities\Post as EPost;
use App\Traits\Active;

class Post extends Model
{
    use Active;
    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    // protected $returnType       = 'array';
    protected $returnType       =  EPost::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'slug', 'body', 'media_id', 'category_id',
        'user_id', 'tags', 'created_at', 'active', 'status',
        'comment_active', 'link', 'author', 'updated_at',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        // 'title' => 'required|min_length[5]|max_length[255]',
        // 'slug' => 'required|alpha_dash|min_length[5]|max_length[255]',
        // 'media_id' => 'numeric',
        // 'category_id' => 'numeric',
        // 'user_id' => 'numeric',
        // 'tags' => 'string',
        // 'created_at' => 'valid_date',
        // 'status' => 'string',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;



    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['slugify'];
    protected $afterInsert    = ['update_cache'];
    protected $beforeUpdate   = ['slugify'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['update_cache'];

    protected function update_cache()
    {
        $cache = \Config\Services::cache();
        $cache->delete('recent_posts');
        $cache->delete('categories_count');
        $cache->deleteMatching('posts*');
    }

    protected function slugify($data)
    {
        if (!isset($data['data']['slug'])) {
            return $data;
        }
        $text = $data['data']['slug'];
        $data['data']['slug'] = mb_strtolower(preg_replace('/[\-\s]+/u', "-", trim(preg_replace('/[ ,.@#$%^&*()_\/=]+/', ' ', $text))));
        return $data;
    }

    protected $imageLocation = 'blogassets/uploads/images/';

    public function withLocation($imageName, $type = '')
    {
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);
        $location = $this->imageLocation . $filename;
        $extra = $type !== '' ? '-' . $type  : '';
        return $location . $extra . '.' . $ext;
    }

    public function cleanURL($string)
    {
        $url = str_replace("'", '', $string);
        $url = str_replace('%20', ' ', $url);
        $url = preg_replace('/[ ,.@#$%^&*()_\/=]+/', ' ', $url);
        $url = preg_replace('/[\-\s]+/u', '-', $url); // substitutes anything but letters, numbers and '_' with separator
        $url = trim($url, "-");
        // $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);  // you may opt for your own custom character map for encoding.
        $url = mb_strtolower($url);
        // $url = preg_replace('~[^-a-z0-9_]+~', '', $url); // keep only letters, numbers, '_' and separator
        return $url;
    }

    public function createThumbnailImage($imageName)
    {
        $image = \Config\Services::image();

        $image->withFile($this->withLocation($imageName))
            ->resize(90, 70, true)
            ->save($this->withLocation($imageName, 'small'));

        $image->withFile($this->withLocation($imageName))
            ->resize(320, 260, true)
            ->save($this->withLocation($imageName, 'thumb'));
    }

    public function createThumb()
    {
        // for ($i = 1; $i < 17; $i++) {
        //     $this->createThumbnailImage("Sports_$i.jpg");
        // }
    }

    function extractVideoId($link)
    {
        $regex = "/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/";
        $match = [];
        if (preg_match($regex, $link, $match)) {
            return end($match);
        } else {
            $link = substr($link, 0, 30);
            throw new Exception("URL is not correct '{$link}....'", 0);
        }
    }

    function getThumbnailLink($youTubeVideoId, $quality)
    {
        $qualities = [
            'LOW' => '/sddefault.jpg',
            'MEDIUM' => '/mqdefault.jpg',
            'HIGH' => '/hqdefault.jpg',
            'MAXIMUM' => '/maxresdefault.jpg',
        ];

        if (in_array($quality, array_keys($qualities))) {
            return 'http://img.youtube.com/vi/' . $youTubeVideoId . $qualities[$quality];
        } else {
            throw new Exception("Required Size [" . implode(',', array_keys($qualities)) . "]", 1);
        }
    }

    function downloadYouTubeThumbnailImage($youTubeLink = '', $thumbnailQuality = '', $fileNameWithExt = '', $fileDownLoadPath = '')
    {
        /**
         * Pull Thumbnail from youtube video
         * https://stackoverflow.com/questions/32346276/get-youtube-video-thumbnail-and-use-it-with-php
         */

        $youTubeVideoId = $this->extractVideoId($youTubeLink);

        $imageUrl = $this->getThumbnailLink($youTubeVideoId, $thumbnailQuality);


        if (empty($fileNameWithExt) || is_null($fileNameWithExt)  || $fileNameWithExt === '') {
            $toArray = explode('/', $imageUrl);
            $fileNameWithExt = md5(time() . mt_rand(1, 10)) . '.' . substr(strrchr(end($toArray), '.'), 1);
        }

        if (!is_dir($fileDownLoadPath)) {
            mkdir($fileDownLoadPath, 0777, true);
        }

        file_put_contents($fileDownLoadPath . $fileNameWithExt, file_get_contents($imageUrl));
        return $fileNameWithExt;
    }


    public function base_select()
    {
        $this->builder()
            ->select('posts.slug,posts.title,posts.created_at,media.name as image,c.name as category_name')
            ->join('categories c', 'c.id=posts.category_id')
            ->join('media', 'media.id=posts.media_id');
        return $this;
    }

    public function trending()
    {
        $cache = \Config\Services::cache();
        return $cache->remember('trending_posts', 24 * 7 * 60 * 60, function () {
            $most_viewed = explode(',', setting('popular_posts'));
            $posts = $this->base_select()
                ->find($most_viewed);
            return $posts;
        });
    }

    public function recent($num = 5)
    {
        $cache = \Config\Services::cache();
        return $cache->remember('recent_posts', 24 * 7 * 60 * 60, function () use ($num) {
            return $this->base_select()
                ->active()
                ->orderBy('posts.id', 'desc')
                ->limit($num)
                ->find();
        });
    }
}

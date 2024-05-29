<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;

class Home extends BaseController
{
    // private function slugify($text)
    // {
    //     return mb_strtolower(preg_replace('/[\-\s]+/u', "-", trim(preg_replace('/[ ,.@#$%^&*()_\/=]+/', ' ', $text))));
    // }


    public function index()
    {
        helper('text');
        $cache = \Config\Services::cache();

        $data = $cache->remember('posts_home', 24 * 7 * 60 * 60, function () {
            $featured = setting('featured_post');
            $postModel = new Post();

            $posts = $postModel->select('posts.slug,posts.title,posts.created_at,media.name as image')
                ->join('media', 'media.id=posts.media_id')
                ->orderBy('posts.id', 'DESC')
                ->active()->limit(12)->find();


            $featured_post = $postModel->select('posts.slug,posts.title,posts.created_at,media.name as image, c.name as category_name')
                ->join('categories c', 'c.id=posts.category_id')
                ->join('media', 'media.id=posts.media_id')
                ->find($featured);


            $videos = $postModel->active()
                ->where('category_id', 11)
                ->select('posts.slug,posts.title,posts.tags,media.name as image')
                ->join('media', 'media.id=posts.media_id')
                ->limit(10)->find();

            $videos = array_chunk($videos, 6);

            return compact('posts', 'featured_post', 'videos');
        });
        return view('home', $data);
    }


    public function news($title)
    {
        helper('text');
        $postModel = new Post();
        $post = $postModel->select("posts.*,categories.name as category_name,media.name as image, media.alt")
            ->where('slug', $title)
            ->active()
            ->join('categories', 'categories.id=posts.category_id')
            ->join('media', 'media.id=posts.media_id')
            ->first();

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $related_post = $postModel->select('posts.id,posts.title,posts.slug,posts.media_id,posts.created_at,categories.name as category_name,media.name as image')
            ->join('categories', 'categories.id=posts.category_id')
            ->join('media', 'media.id=posts.media_id')
            ->where('posts.id !=', $post->id)
            ->active()
            ->groupStart()
            ->like('category_id', $post->category_id);

        foreach ($post->tags as $tag) {
            $related_post->orLike('tags', $tag);
        }

        $related_posts = $related_post->groupEnd()->limit(2)->find();

        // dd($related_posts);
        return view('news', compact('post', 'related_posts'));
    }

    public function tags($category)
    {
        helper('text');
        $type = $this->request->getUri()->getSegment(1);
        $num = trim($this->request->getGet('num'));
        $num = $num ? (int) $num : 15;
        $postModel = new Post();

        $postsQuery = $postModel
            ->select('posts.*,media.name as image,media.alt as alt,media.type as media_type')
            ->join('media', 'media.id=posts.media_id')
            ->active()
            ->orderBy('id', 'desc');
        if ($type === 'category') {
            $category_id = (new Category())->select('id')->where('name', trim($category))->first();
            if (!$category_id) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            $posts = $postsQuery
                ->where('category_id', $category_id->id)
                ->paginate($num);
        } else {
            $posts = $postsQuery
                ->like($type, trim($category))
                ->paginate($num);
        }
        $pager = $postModel->pager;

        return view('category', compact('posts', 'type', 'category', 'pager'));
    }


    public function search()
    {
        helper('text');
        $key = trim($this->request->getGet('q'));
        $num = trim($this->request->getGet('num'));
        $num = $num ? (int) $num : 15;
        if (!$key) return redirect()->back()->with('msg', 'Search Field Cannot be empty');

        $key = htmlspecialchars(strip_tags($key), ENT_QUOTES);
        $postModel = new Post();
        $type = 'Search';
        $category = $key . '...';
        $posts = $postModel->active()
            ->select('posts.*,media.name as image,media.alt as alt,media.type as media_type')
            ->join('media', 'media.id=posts.media_id')
            ->orderBy('id', 'desc')
            ->like('title', $key)
            ->paginate($num);
        // if (!$posts) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $pager = $postModel->pager;
        return view('search', compact('posts', 'type', 'pager', 'category'));
    }
}

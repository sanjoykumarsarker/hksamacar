<?php

namespace App\Libraries;

use App\Models\Category;
use App\Models\Post;

class LatestPostCategories
{
    public function latestPosts($num = 5)
    {
        $cache = \Config\Services::cache();
        $recent_posts = $cache->remember('recent_posts', 24 * 7 * 60 * 60, function () use ($num) {
            $postModel = new Post();
            return $postModel->select('posts.slug,posts.title,posts.created_at,media.name as image,categories.name as category_name')
                ->active()
                ->join('categories', 'categories.id=posts.category_id')
                ->join('media', 'media.id=posts.media_id')
                ->orderBy('posts.id', 'desc')
                ->limit($num)
                ->find();
        });
        return $recent_posts;
    }

    public function latestCategories($num = 5)
    {
        $cache = \Config\Services::cache();
        $categories_count = $cache->remember('categories_count', 24 * 7 * 60 * 60, function () use ($num) {
            $categoryModel = new Category();
            return $categoryModel->select('categories.id,categories.name,COUNT(posts.id) as total_posts')
                ->join('posts', 'posts.category_id=categories.id')
                ->groupBy('name')
                ->orderBy('total_posts')
                ->limit($num)
                ->find();
        });
        return $categories_count;
    }

    public function trendingPosts()
    {
        $cache = \Config\Services::cache();
        $trending_posts = $cache->remember('trending_posts', 24 * 7 * 60 * 60, function () {
            $most_viewed = explode(',', setting('popular_posts'));
            $postModel = new Post();
            $most_viewed_posts = $postModel
                ->select('posts.slug,posts.title,posts.created_at,media.name as image,c.name as category_name')
                ->join('categories c', 'c.id=posts.category_id')
                ->join('media', 'media.id=posts.media_id')
                ->find($most_viewed);
            return  $most_viewed_posts;
        });
        return $trending_posts;
    }
}

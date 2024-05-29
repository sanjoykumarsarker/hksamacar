<?php

namespace App\Cells;


class Blog
{
    public function trending()
    {
        $posts = model('Post')->trending();
        return view('cells/trending_post', ['posts' => $posts]);
    }

    public function recent()
    {
        $num = 3;
        $posts = model('Post')->recent($num);
        return view('cells/recent_posts', ['posts' => $posts]);
    }

    public function recentBottom()
    {
        $num = 3;
        $posts = model('Post')->recent($num);
        return view('cells/recent_posts_bottom', ['posts' => $posts]);
    }

    public function categories()
    {
        $num = 5;
        $categories = model('Category')->trending($num);
        return view('cells/categories_bottom', compact('categories'));
    }
}

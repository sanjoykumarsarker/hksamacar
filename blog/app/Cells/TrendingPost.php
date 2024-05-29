<?php

namespace App\Cells;


class TrendingPost
{
    public function show()
    {
        $posts = model('Post')->trending();
        return view('cells/trending_post', ['posts' => $posts]);
    }
}

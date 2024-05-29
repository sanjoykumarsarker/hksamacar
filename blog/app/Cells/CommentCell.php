<?php

namespace App\Cells;


class CommentCell
{
    public function index($post_id)
    {
        $comments = [];
        /**
         * @todo
         *  fetch comments for each posts
         */
        // $comments = model('CommentModel')
        // ->where('post_id', $post_id)
        // ->with('users')
        // ->active()->paginate();
        return view('cells/comments', compact('comments'));
    }
}

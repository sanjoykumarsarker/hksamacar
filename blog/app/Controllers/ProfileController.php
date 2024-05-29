<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;

class ProfileController extends BaseController
{
    public function index()
    {
        helper('text');
        $user = Auth::user();
        $posts = model('Post')
            ->base_select()
            ->select('posts.body')
            ->where('posts.user_id', $user->id)
            ->paginate(10);
        return view('pages/profile', compact('user', 'posts'));
    }

    public function edit()
    {
        helper(['form', 'input']);
        $user = Auth::user();
        return view('pages/profile_edit', compact('user'));
    }

    public function verify($hash)
    {
        // try {
        //     // $user = model('User')->where('expires_at !=', null)->where('expires_at BETWEEN', 'DATE_SUB(DATE(NOW()), INTERVAL 2 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)')->where('verification', $hash)->get();
        // } catch (\Throwable $th) {
        //     return $this->denied($th->getMessage());
        // }
        $d = date("Y-m-d");
        $string = 'asimroy.du@gmail.com' . strtotime($d . "-1 day");

        $msg = 'Sorry, Your code is no longer valid!<br/> <span class="text-muted">Please Contact Admin</span>';
        $str = md5($string);

        if (md5($string) == $str) {
            $msg = 'Email Verification Successfull';
        }
        return view('profile/verify', compact('msg'));
    }
}

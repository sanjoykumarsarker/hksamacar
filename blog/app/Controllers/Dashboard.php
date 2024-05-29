<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;

class Dashboard extends BaseController
{
    public function index()
    {
        // var_dump(Auth::isLoggedIn());
        return view('admin/dashboard');
    }

    public function blank()
    {
        return view('admin/blank');
    }

    // public function pages($name)
    // {
    //     return view('pages/index', compact('name'));
    //  }
}

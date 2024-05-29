<?php

use App\Models\Auth;

if (!function_exists('set_signin')) {
    function set_signin($user)
    {
        if (!isset($user)) return false;

        Auth::attempt($user);
    }
}

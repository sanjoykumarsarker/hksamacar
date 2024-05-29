<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\Auth;
use App\Models\User;
// use CodeIgniter\API\ResponseTrait;

class TestController extends BaseController
{
    public function index()
    {
        $data = 'Testing';
        $user = model('User')->find(2);
        $data = model('User')->attachPermission($user);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit();
    }
}

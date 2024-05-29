<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SupportController extends BaseController
{
    public function index()
    {
        $data = ['to' => 'pranta1204@gmail.com', 'subject' => 'Hare krishna', 'message' => 'Hello'];
        model('JobsModel')->insert([
            'name' => 'sendEmail',
            'payload' => json_encode($data, JSON_UNESCAPED_UNICODE)
        ]);

        return view('admin/support/index');
    }
}

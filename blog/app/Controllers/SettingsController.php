<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingsModel;

class SettingsController extends BaseController
{
    public function index()
    {
        helper(['form', 'input']);
        $settings = model('SettingsModel')->findAll();
        $grouped_settings = [];
        foreach ($settings as $setting) {
            $grouped_settings[$setting['group']][] = $setting;
        }
        return view('admin/settings/index', compact('grouped_settings'));
    }

    public function update()
    {
        $data = $this->request->getPost();
        $key = $data['key'];

        $data = array_diff_key($data, ['csrf_test_name' => 0, 'key' => 0]);
        $model = new SettingsModel();
        // $founds = $model->whereIn('key', array_keys($data))->find();
        $to_update = [];
        $i = 0;
        foreach ($data as $key => $value) {
            // if ($founds[$i]['key'] === $key && $founds[$i]['value'] !== $value) {
            $to_update[] = [
                // 'id' => (int) $founds[$i]['id'],
                'key' => $key,
                'value' => $value
            ];
            // }
            $i++;
        }

        try {
            $model->updateBatch($to_update, 'key');
            $model->clean_cache();
            // $url = base_url(route_to('admin.settings') . "?active=$key");
            return redirect()->back()->with('msg', 'Settings Successfully Updated!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('msg', $th->getMessage());
        }
    }

    public function clean_cache()
    {
        // if (!$this->authorize('clean_all_cache')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        if (!$this->authorize('clean_all_cache')) return $this->denied();
        try {
            $msg =  command('debugbar:clear --no-header');
            $msg =  command('logs:clear --force --no-header');
            $msg =  command('cache:clear --no-header');
            // $msg =  "command('cache:clear --no-header')";
            // $msg =  command('migrate --no-header');
            // $msg =  command('make:controller PermissionController --no-header');
            // $msg =  command('db:seed RolePermissionSeeder --no-header');
            return redirect()->back()->with('msg', $msg ?? 'Try Again!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('msg', $th->getMessage());
        }
    }
}

<?php

namespace App\Libraries;

use App\Models\SettingsModel;

class SiteSettings
{
    protected $model;

    public function __construct()
    {
        $this->model = new SettingsModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function get($key)
    {
        return $this->model->all()[$key] ?? '';
    }

    public function set($key, $value)
    {
        return $this->model->insert([$key => $value]);
    }
}

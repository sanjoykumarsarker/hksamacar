<?php

if (!function_exists('setting')) {
    function setting($key = null, $value = null, $data = null)
    {
        // $cache = \Config\Services::cache();
        // $cache->deleteMatching('settings_*');
        $setting = service('settings');
        if (empty($key)) return $setting;
        if (count(func_get_args()) === 1) return $setting->get($key)->value;
        if ($value === true) return (bool) $setting->get($key)->active;
        return $setting->get($key);
        // $setting->set($key, $value);
    }
}

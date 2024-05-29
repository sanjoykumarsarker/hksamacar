<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter4.github.io/CodeIgniter4/
 */
if (!function_exists('assets_url')) {
    function assets_url($location, $version = null)
    {
        $url = base_url("blogassets/$location");
        if ($version) return $url . '?v=' . $version;
        return $url;
    }
}

if (!function_exists('image_placeholder')) {
    function image_placeholder(string $image = null, bool $linkOnly = false): string
    {
        if ($linkOnly) return assets_url($image ?? 'placeholder.svg');
        return "onerror=\"this.src='" . assets_url($image ?? 'placeholder.svg') . "'\"";
    }
}

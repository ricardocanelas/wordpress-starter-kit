<?php

#-----------------------------------------------------------------#
# WP Enqueue Scripts
#-----------------------------------------------------------------#

use \BaseT\JsonManifest as JsonManifest;

function asset_path($filename)
{
    $dist_path = get_template_directory_uri() . DIST_DIR;
    $directory = dirname($filename) . '/';
    $file = basename($filename);
    static $manifest;

    if (empty($manifest)) {
        $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
        $manifest = new JsonManifest($manifest_path);
    }

    if (array_key_exists($file, $manifest->get())) {
        return $dist_path . $directory . $manifest->get()[$file];
    } else {
        return $dist_path . $directory . $file;
    }
}


function assets()
{
    wp_enqueue_style('main-style',   asset_path('styles/main.css'), false, null);
    wp_enqueue_script('main-script', asset_path('scripts/main.js'), [], null, true);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

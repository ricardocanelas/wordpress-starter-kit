<?php

#-----------------------------------------------------------------#
# Defines a named constant
#-----------------------------------------------------------------#

if (!defined('WP_ENV')) {
    // Fallback if WP_ENV isn't defined in your WordPress config
    // Used in lib/app/setup.php to check for 'development' or 'production'
    define('WP_ENV', 'development');
}

if (!defined('DIST_DIR')) {
    // Path to the build directory for front-end assets (gulp -watch)
    define('DIST_DIR', '/dist/');
}



#-----------------------------------------------------------------#
# Base Template includes
#-----------------------------------------------------------------#
/**
 *
 * The base_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */

$base_includes = [
    'lib/base/BaseWrapping.php',
    'lib/base/JsonManifest.php',

    'lib/app/enqueue_scripts.php',
    'lib/app/menu.php',
    'lib/app/phpmailer.php',
    'lib/app/posttypes.php',
    'lib/app/setup.php',
    'lib/app/Util.php',
    'lib/app/shortcodes.php',
    'lib/app/widgets.php',

    'rest_api/*',

    'templates/components/header/HeaderComp.php'
];

foreach ($base_includes as $file)
{
    if(substr($file, -1) === '*') {
        $path = dirname(__FILE__) . '/' . $file;
        foreach (glob($path) as $f) {
            if (is_file($f)) include_once $f;
        }
        continue;
    }

    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'basetwo'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);



#-----------------------------------------------------------------#
# Using the 'themes/basetwo/templates' folder as root
#-----------------------------------------------------------------#

/**
 * Here's what's happening with these hooks:
 * 1. WordPress detects theme in themes/basetwo
 * 2. When we activate, we tell WordPress that the theme is actually in themes/basetwo/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/basetwo
 *
 * We do this so that the Template Hierarchy will look in themes/basetwo/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/basetwo
 *
 * themes/basetwo/index.php also contains some self-correcting code, just in case the template option gets reset
 */

add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});

add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    if (basename($stylesheet) !== 'templates') {
        update_option('stylesheet', $stylesheet . '/templates');
    }
});

add_action('customize_render_section', function ($section) {
    if ($section->type === 'themes') {
        $section->title = wp_get_theme(basename(__DIR__))->display('Name');
    }
}, 10, 2);
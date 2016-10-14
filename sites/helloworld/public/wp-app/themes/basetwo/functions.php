<?php

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
    'lib/base/config.php',
    'lib/base/wrapper.php',
    'lib/base/assets.php',

    'lib/app/phpmailer.php',
    'lib/app/widgets.php',
    'lib/app/menu.php',
    'lib/app/posttypes.php',
    'lib/app/shortcodes.php',

    'api/*',
];
foreach ($base_includes as $file) {

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


/**
 * Here's what's happening with these hooks:
 * 1. WordPress detects theme in themes/sage
 * 2. When we activate, we tell WordPress that the theme is actually in themes/sage/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage
 *
 * We do this so that the Template Hierarchy will look in themes/sage/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage
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


#-----------------------------------------------------------------#
# Util
#-----------------------------------------------------------------#
class Util {

    public static function post_class($class = ''){
        echo self::get_post_class($class);
    }
    public static function get_post_class($class = ''){
        return $class . ' ' . get_post_type() . ' ' . get_post_type() . '-' . get_the_ID();
    }

}


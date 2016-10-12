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
    'lib/config.php',               // Theme wrapper class
    'lib/wrapper.php',              // Theme wrapper class
    'lib/assets.php',               // Theme wrapper class
];
foreach ($base_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'basetwo'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);



#-----------------------------------------------------------------#
# Config PHPMailer on development environment
#-----------------------------------------------------------------#

if(WP_ENV == 'development') {
    add_action('phpmailer_init', 'my_phpmailer_example');
    function my_phpmailer_example( $phpmailer ) {
        $phpmailer->IsSMTP(); // enable SMTP
        $phpmailer->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $phpmailer->SMTPAuth = true;  // authentication enabled
        $phpmailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->Port = 465;
        $phpmailer->Username = 'myemail@gmail.com';
        $phpmailer->Password = '**********'; // please, don't change this password. Never ever!
        $phpmailer->From = "myemail@gmail.com";
        $phpmailer->FromName = "Ricardo Canelas (" . WP_ENV . " environment)";
    }
}


/**
 * Here's what's happening with these hooks:
 * 1. WordPress detects theme in themes/sage
 * 2. When we activate, we tell WordPress that the theme is actually in themes/sage/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage
 *
 * We do this so that the Template Hierarchy will look in themes/sage/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage
 *
 * themes/sage/index.php also contains some self-correcting code, just in case the template option gets reset
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
# Theme Setup
#-----------------------------------------------------------------#

add_action('after_setup_theme', function () {
    /**
     * Enable plugins to manage the document title
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'basetwo')
    ]);

    add_theme_support('post-thumbnails');

    /**
     * Enable post formats
     * @link http://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    /**
     * Enable HTML5 markup support
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

});




#-----------------------------------------------------------------#
# Widgets
#-----------------------------------------------------------------#

add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
            'name'          => __('Primary', 'sage'),
            'id'            => 'sidebar-primary'
        ] + $config);
    register_sidebar([
            'name'          => __('Footer', 'sage'),
            'id'            => 'sidebar-footer'
        ] + $config);
});





#-----------------------------------------------------------------#
# Register Post Types
#-----------------------------------------------------------------#

add_action('init', 'register_project');

function register_project()
{
    $labels = array(
        'name' => _x( 'Projects', 'project' ),
        'singular_name' => _x('Project', 'project'),
        'add_new' => _x('Add New', 'project'),
        'add_new_item' => _x('Add New Project', 'project'),
        'edit_item' => _x('Edit Project', 'project'),
        'new_item' => _x('New Project', 'project'),
        'view_item' => _x('View Project', 'project'),
        'search_items' => _x('Search project', 'project'),
        'not_found' => _x('No project found', 'project'),
        'not_found_in_trash' => _x('No project found in Trash', 'project'),
        'parent_item_colon' => _x('Parent Project:', 'project'),
        'menu_name' => _x('Projects', 'project'),
    );

    register_post_type('project',
        array(
            'labels' => $labels,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'excerpt', 'thumnail'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => 'project',
            'can_export' => true,
            'rewrite' => array( 'slug' => 'projects'),
            'capability_type' => 'post'
        )
    );
}


flush_rewrite_rules();
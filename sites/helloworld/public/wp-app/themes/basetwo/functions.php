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
    'lib/wrapper.php',               // Theme wrapper class
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
        $phpmailer->From = "wpsendmailsoftwaredesign@gmail.com";
        $phpmailer->FromName = "Software Design (" . WP_ENV . " environment)";
    }
}



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
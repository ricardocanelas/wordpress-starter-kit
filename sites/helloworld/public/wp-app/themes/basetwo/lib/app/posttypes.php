<?php

#-----------------------------------------------------------------#
# Projects
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

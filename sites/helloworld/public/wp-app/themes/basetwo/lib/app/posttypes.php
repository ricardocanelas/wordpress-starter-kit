<?php

#-----------------------------------------------------------------#
# Projects
#-----------------------------------------------------------------#

function register_posty_type_project()
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
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail','comments'),
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
            'rewrite' => array( 'slug' => 'projects', 'with_front' => true),
            'capability_type' => 'post',
            'taxonomies' => array(
                'project_category',
            )
        )
    );
}

function register_taxonomy_project_category() {

    $labels = array(
        'name' => _x( 'Categories', 'project_category' ),
        'singular_name' => _x( 'Category', 'project_category' ),
        'search_items' => _x( 'Search Categories', 'project_category' ),
        'popular_items' => _x( 'Popular Categories', 'project_category' ),
        'all_items' => _x( 'All Categories', 'project_category' ),
        'parent_item' => _x( 'Parent Category', 'project_category' ),
        'parent_item_colon' => _x( 'Parent Category:', 'project_category' ),
        'edit_item' => _x( 'Edit Category', 'project_category' ),
        'update_item' => _x( 'Update Category', 'project_category' ),
        'add_new_item' => _x( 'Add New Category', 'project_category' ),
        'new_item_name' => _x( 'New Category', 'project_category' ),
        'separate_items_with_commas' => _x( 'Separate categories with commas', 'project_category' ),
        'add_or_remove_items' => _x( 'Add or remove categories', 'project_category' ),
        'choose_from_most_used' => _x( 'Choose from the most used categories', 'project_category' ),
        'menu_name' => _x( '&#8226; Categories', 'project_category' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'projects/category'),
        'query_var' => true
    );

    register_taxonomy( 'project_category', array('project_category', 'project_category'), $args );
}



//add_action('init', 'register_taxonomy_project_category' );
add_action('init', 'register_posty_type_project');

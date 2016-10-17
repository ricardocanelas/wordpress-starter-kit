# CODE SNIPPETS
 
## Functions

### Category/Taxonomy

##### Register a New Category/Taxonomy

[Document](https://developer.wordpress.org/reference/functions/register_taxonomy/)

~~~php

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

~~~


##### Get All Categories/Taxonomies

[Document](https://developer.wordpress.org/reference/functions/get_the_tags/)

~~~php 

  get_terms( 'category', 'orderby=count&hide_empty=0');
  get_terms( 'my_custom_category', 'orderby=count&hide_empty=0');

~~~



##### Get All Categories/Taxonomies selected by post

[Document](https://developer.wordpress.org/reference/functions/wp_get_post_terms/)

~~~php 

   wp_get_post_terms(get_the_ID(), 'category', array("fields" => "all"));
  
  // custom category
  wp_get_post_terms(get_the_ID(), 'my_custom_category', array("fields" => "all"));

~~~



 
## Action 

##### Add ReWrite Rule

[Document](https://developer.wordpress.org/reference/functions/add_rewrite_rule/)

~~~php 

add_action('init', 'add_actor_url');

function add_blog_url(){
    add_rewrite_rule(
        '^blog/([^/]*)$',
        'index.php?pagename=$matches[1]',
        'top'
    );
}

~~~


## Filter


##### Order by Post Type
  
[Document](https://developer.wordpress.org/reference/hooks/posts_clauses/)

~~~php

function filter_by_specific_post_type( $clauses, $query_object ){
    //$clauses['orderby'] = "post_type ASC";
    // or with specific post type: 
    $clauses['orderby'] = "case post_type when 'products' then 1 else 2 end ASC";
    // Regardless, we need to return our clauses...
    return $clauses;
}

add_filter( 'posts_clauses', 'filter_by_specific_post_type', 10, 2 );

remove_filter('posts_clauses', 'filter_by_specific_post_type');

~~~


## Links

* [Wordpress code snippets](https://www.wp-code.com/)
* [Snipplr](http://snipplr.com/all/tags/wordpress/)
* [WPSnipp](http://wpsnipp.com/)
* [PressCustomizr](http://presscustomizr.com/code-snippets/)
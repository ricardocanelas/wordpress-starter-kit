# CODE SNIPPETS
 
## Functions

### Category/Taxonomy

##### Register a New Category/Taxonomy [Document](https://developer.wordpress.org/reference/functions/register_taxonomy/)

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


##### Get All Categories/Taxonomies [Document](https://developer.wordpress.org/reference/functions/get_the_tags/)

~~~php 

  get_terms( 'category', 'orderby=count&hide_empty=0');
  get_terms( 'my_custom_category', 'orderby=count&hide_empty=0');

~~~



##### Get All Categories/Taxonomies selected by post [Document](https://developer.wordpress.org/reference/functions/wp_get_post_terms/)

~~~php 

   wp_get_post_terms(get_the_ID(), 'category', array("fields" => "all"));
  
  // custom category
  wp_get_post_terms(get_the_ID(), 'my_custom_category', array("fields" => "all"));

~~~


<hr/><br/><br>

### Post (CRUD)

##### Insert Post [Document](https://developer.wordpress.org/reference/functions/wp_insert_post/)

~~~php 

wp_insert_post( array(
    'post_title'    => wp_strip_all_tags( 'HolaMundo '),
    'post_content'  => 'bla bla bla.. ',
    'post_status'   => 'publish',
    'post_author'   => 1) 
);

add_action( 'save_post', 'set_something' );
function set_something($post_id){...}

~~~


##### Update Post [Document](https://codex.wordpress.org/Function_Reference/wp_update_post)

~~~php 

wp_update_post( array(
    'ID'           => $post->ID,
    'post_title'   => $post->post_title . ' (removed it) ')
);

add_action( 'save_post', 'set_something' );
function set_something($post_id){...}


~~~


##### Delete Post [Document](https://codex.wordpress.org/Function_Reference/wp_delete_post)

~~~php 

wp_delete_post( $postid, $force_delete );

do_action('delete_post', 'before_delete_post', 10); // before delete
function before_delete_post($pid){...}

do_action('deleted_post', 'after_deleted_post', 10); // before delete
function after_after_post($pid){...}

~~~


##### Transitions Post (hook) [Document](https://developer.wordpress.org/reference/hooks/transition_post_status/)

~~~php 

add_action('transition_post_status', 'on_all_status_transitions', 10, 3);

function on_all_status_transitions( $new_status, $old_status, $post ) {

    // $post    --> https://codex.wordpress.org/Class_Reference/WP_Post
    // $_status --> new, publish, pending, draft, auto-draft, future, private, inherit, trash

    if ( $new_status != $old_status ) {
        // A function to perform actions any time any post changes status.
        
        if ( $old_status == 'new' && $new_status == 'publish'){
            // after create a new post...
        }
    }
}

~~~


<hr/><br/><br>

### Term (CRUD)

##### Insert Term [Document](https://codex.wordpress.org/Function_Reference/wp_insert_term)

~~~php 

wp_insert_term( $term, $taxonomy, $args = array() );

// Example
$parent_term = term_exists( 'fruits', 'product' ); // array is returned if taxonomy is given
$parent_term_id = $parent_term['term_id']; // get numeric term id

wp_insert_term(
  'Apple',   // the term 
  'product', // the taxonomy
  array(
    'description'=> 'A yummy apple.',
    'slug' => 'apple',
    'parent'=> $parent_term_id
  )
);

~~~


##### Update Term [Document](https://codex.wordpress.org/Function_Reference/wp_update_term)

~~~php 

wp_update_term( $term_id, $taxonomy, $args )

~~~


##### Delete Term [Document](https://codex.wordpress.org/Function_Reference/wp_delete_term)

~~~php 

wp_delete_term( 25, 'category' ) 

~~~



##### Term Hooks [Document](https://codex.wordpress.org/Function_Reference/wp_insert_term)

~~~php 

function my_create( $term_id, $tt_id, $taxonomy ){
    // do some stuff
}

add_action( 'create_term', 'my_create', 10, 3 )
add_action( 'edit_term',   'my_edit', 10, 3 )
add_action( 'edited_terms',   'my_edit', 10, 3 )
add_action( 'delete_term', 'my_delete', 10, 3 )
add_action( 'delete_term_taxonomy', 'my_delete', 10, 3 )
add_action( 'deleted_term_taxonomy', 'my_delete', 10, 3 )

~~~


<hr/><br/><br>
 
## Actions
[Document](https://codex.wordpress.org/Plugin_API/Action_Reference) 

##### Add ReWrite Rule [Document](https://developer.wordpress.org/reference/functions/add_rewrite_rule/)

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

<hr/><br/><br>

## Filters


##### Order by Post Type [Document](https://developer.wordpress.org/reference/hooks/posts_clauses/)

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
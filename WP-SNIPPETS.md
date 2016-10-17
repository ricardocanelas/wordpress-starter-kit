# CODE SNIPPETS
 
## Filter

##### Order by Post Type
  
~~~php
<?php

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
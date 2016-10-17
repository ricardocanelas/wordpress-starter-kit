<?php
/**
 * Template Name: HomePage Template
 *
 */
?>


<h2>Template-Home.php</h2>

<h3>Blog Category:</h3>

<?php

    $terms = get_terms( 'category', 'orderby=count&hide_empty=0');

    echo '<ul>';

    foreach ( $terms as $term ) {

        // The $term is an object, so we don't need to specify the $taxonomy.
        $term_link = get_term_link( $term );

        // If there was an error, continue to the next term.
        if ( is_wp_error( $term_link ) ) {
            continue;
        }

        // We successfully got a link. Print it out.
        echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
    }

    echo '</ul>';

?>

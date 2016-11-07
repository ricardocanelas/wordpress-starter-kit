<?php

// Example:
// http://localhost:3000/wordpress/wp-admin/admin-ajax.php?action=get_posts&render=json

add_action('wp_ajax_nopriv_get_posts', 'api_get_posts');
add_action('wp_ajax_get_posts', 'api_get_posts');

function api_get_posts()
{
    $qPage     = isset($_POST['qPage'])     ? $_POST['qPage']     : 1;
    $perPage   = isset($_POST['perPage'])   ? $_POST['perPage']   : 10;
    $qOrderBy  = isset($_POST['qOrderBy'])  ? $_POST['qOrderBy']  : 'title';
    $qOrder    = isset($_POST['qOrder'])    ? $_POST['qOrder']    : 'ASC';
    $render    = isset($_POST['render'])    ? $_POST['render']    : 'json';

    $render = strtolower($render);

    $arg = array(
        'post_status' => array('publish'),
        'post_type' => 'post',
        'posts_per_page' => $perPage,
        'paged' => $qPage,
        'orderby' => $qOrderBy,
        'order' => $qOrder,
    );

    // Type of the render
    if($render == 'html') {
        query_posts($arg);
        while (have_posts()){
            the_post();
            include get_theme_root() . '/basetwo/templates/partials/content.php';
        }
        wp_reset_query();

    } else{
        $query = new WP_Query($arg);
        echo json_encode(array('results' => $query->posts, 'status' => 'ok'));
    }

    wp_die();
}


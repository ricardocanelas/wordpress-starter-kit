<?php

#-----------------------------------------------------------------#
# Utils
#-----------------------------------------------------------------#

function util_post_class($class = ''){
    return $class . ' ' . get_post_type() . ' ' . get_post_type() . '-' . get_the_ID();
}

// home page page-id-7 page-template page-template-templates page-template-template-home page-template-templatestemplate-home-php logged-in admin-bar  customize-support
//function util_body_class($classes = '') {
//    $classes = body_class();
//    // Add page slug if it doesn't exist
//    if (is_single() || is_page() && !is_front_page()) {
//        if (!in_array(basename(get_permalink()), $classes)) {
//            $classes[] = basename(get_permalink());
//        }
//    }
//    return $classes;
//}
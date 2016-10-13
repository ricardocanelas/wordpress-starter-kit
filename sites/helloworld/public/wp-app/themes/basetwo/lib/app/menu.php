<?php

#-----------------------------------------------------------------#
# Menu
#-----------------------------------------------------------------#

add_action('after_setup_theme', function () {
    /**
     * Register navigation menus
     * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'basetwo')
    ]);

});
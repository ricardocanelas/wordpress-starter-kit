<?php

function wpplugin_cta()
{
    wp_register_style('cta_stylesheet', plugins_url( '../styles/cta-style.css', __FILE__ ) );
    wp_enqueue_style( 'cta_stylesheet' );

    wp_register_script('cta_script', plugins_url('../scripts/cta-script.js', __FILE__), array('') );
    wp_enqueue_script('cta_script');

    echo '<div class="cta">';
    echo '<p>Call us on 000-0000 or email <a href="mailto:sales@example.com">sales@example.com</a></p>';
    echo '</div>';
}
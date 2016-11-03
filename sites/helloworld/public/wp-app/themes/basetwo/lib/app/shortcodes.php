<?php

#-----------------------------------------------------------------#
# Shortcodes
#-----------------------------------------------------------------#

/*
 * COMPONENT-HEADER
 *
 * e.g:
 * [component-header title="My Title" sub_title='Virtute epicuri eos eu, vim novum verear ex']
 *
 * @param $atts
 * [title]        => Title of the header     | require
 * [sub_title]    => Subtitle of the header  | default: null
 *
 */

function shortcode_component_header_func($atts)
{
    $params = shortcode_atts(array(
        'title' => 'Button',
        'sub_title' => null
    ), $atts);

    $comp = new \BaseT\Components\HeaderComp($params);
    $comp->renderHtml();

    return;
}

add_shortcode('component-header', 'shortcode_component_header_func');




<?php

class Util {

    public static function post_class($class = ''){
        echo self::get_post_class($class);
    }
    public static function get_post_class($class = ''){
        return $class . ' ' . get_post_type() . ' ' . get_post_type() . '-' . get_the_ID();
    }
}

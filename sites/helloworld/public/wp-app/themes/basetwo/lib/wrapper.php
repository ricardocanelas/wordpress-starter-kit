<?php

namespace BaseT\Wrapper;

/**
 * Theme wrapper
 *
 * @link https://oregand.github.io
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */

function template_path()
{
    return BaseWrapping::$main_template;
}

class BaseWrapping
{
    // Stores the full path to the main template file
    public static $main_template;

    // Basename of template file
    public static $base;

    // Array of templates
    public $slug;

    // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
    public $templates;

    public function __construct($template = 'templates/layouts/base.php')
    {
        $this->slug = basename($template, '.php');
        $this->templates = [$template];

        if (self::$base) {
            $str = substr($template, 0, -4);
            //array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
            array_unshift($this->templates, self::$base);
        }
        //echo "Templates:<br/>"; var_dump($this->templates); echo "<br/>";
    }

    public static function wrap($main)
    {
        // Check for other filters returning null
        if (!is_string($main)) {
            return $main;
        }

        self::$main_template = $main;
        self::$base =  'templates/' . basename(self::$main_template, '.php');

        if (self::$base === 'index') {
            self::$base = false;
        }

        return new BaseWrapping();
    }

    public function __toString()
    {
        $this->templates = apply_filters('basetwo/wrap_' . $this->slug, $this->templates);
        return locate_template($this->templates);
    }
}

add_filter('template_include', [__NAMESPACE__ . '\\BaseWrapping', 'wrap'], 99);

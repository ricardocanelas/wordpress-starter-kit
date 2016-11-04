<?php
use BaseT\Components\HeaderComp;
?>

<?php
    /**
     * Using component header
     * Example 1:
     */
    $header = new HeaderComp(['title' => 'My Title']);
    $header->renderHtml();
?>

<?php
    /**
     * Using component header
     * Example 2:
     */
    echo do_shortcode("[component-header title='Another Title' sub_title='Virtute epicuri eos eu, vim novum verear ex']")
?>

<div class="row">
    <div class="col-xs-12">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('partials/content-single', get_post_type()); ?>
        <?php endwhile; ?>
    </div>
</div>


<?php wpplugin_cta(); ?>

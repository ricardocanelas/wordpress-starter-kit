<?php
use BaseT\Components\HeaderComp;
?>

<?php
    $header = new HeaderComp(['title' => 'My Title']);
    $header->renderHtml();
?>

<div class="row">
    <div class="col-xs-12">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('partials/content-single', get_post_type()); ?>
        <?php endwhile; ?>
    </div>
</div>

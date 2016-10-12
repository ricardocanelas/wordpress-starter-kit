<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Projects</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
    </div>
</div>

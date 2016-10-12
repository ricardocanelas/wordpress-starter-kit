<div class="row">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('partials/content-single', get_post_type()); ?>
    <?php endwhile; ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-default" href="<?= home_url('projects') ?>">Back</a>
    </div>
</div>



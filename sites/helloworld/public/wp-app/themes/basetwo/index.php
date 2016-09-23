<h1>Index my friend</h1>

<?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'basetwo'); ?>
    </div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>
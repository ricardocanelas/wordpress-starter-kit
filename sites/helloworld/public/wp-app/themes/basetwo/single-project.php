<h3>Single-Project / All</h3>

<?php if (!have_posts()) : ?>

    <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'basetwo'); ?>
    </div>

<?php else: ?>

    <h4><?php the_title() ?></h4>

    <p><?php the_excerpt() ?></p>

    <?php the_content() ?>

<?php endif; ?>

<hr/>

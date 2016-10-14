<div class="col-xs-12 <?= Util::get_post_class('content-single') ?>">

    <?php get_template_part('partials/entry-meta'); ?>

    <h3 class="entry-title">
        <a href="<?= get_permalink() ?>">
            <?php the_title(); ?>
        </a>
    </h3>

    <div class="entry-date">
        <time class="updated" datetime="<?= get_post_time('c', true); ?>">
            <?= get_the_date(); ?>
        </time>
    </div>


    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <div class="entry-author">
        <?= __('By', 'basetwo'); ?>
        <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
            <?= get_the_author(); ?>
        </a>
    </div>

    <div class="entry-pages">
        <?php wp_link_pages([
            'before' => '<nav class="page-nav"><p>' . __('Pages:', 'basetwo'),
            'after' => '</p></nav>']);
        ?>
    </div>

    <div class="entry-comments">
        <?php comments_template('/templates/partials/comments.php'); ?>
    </div>

</div>

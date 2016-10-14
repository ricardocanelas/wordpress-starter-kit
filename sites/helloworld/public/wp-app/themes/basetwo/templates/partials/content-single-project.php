<div class="col-xs-12 <?= Util::get_post_class('content-single') ?>">

    <h3 class="entry-title">
        <a href="<?= get_permalink() ?>">
            <?php the_title(); ?>
        </a>
    </h3>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

</div>


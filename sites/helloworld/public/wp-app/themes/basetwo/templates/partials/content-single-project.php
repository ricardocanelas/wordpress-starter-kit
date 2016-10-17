<?php
$fields = get_fields();
$colorStyle = $fields['color'] == ''? '': "color:{$fields['color']}";
?>

<div class="col-xs-12 <?= Util::get_post_class('content-single') ?>">

    <h3 class="entry-title">
        <a href="<?= get_permalink() ?>" style="<?= $colorStyle ?>">
            <?php the_title(); ?>
        </a>
    </h3>

    <?php if ( has_post_thumbnail() ): ?>
        <div class="entry-thumbnail"
             style="background-image: url(<?= the_post_thumbnail_url('large'); ?>)">
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>


</div>


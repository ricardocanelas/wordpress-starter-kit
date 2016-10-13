<div class="col-xs-12 col-sm-6 col-md-4 <?= util_post_class('content-single') ?>">

    <div class="post-container thumbnail">

        <div class="image">
            <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
        </div>

        <div class="caption">
            <h3>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <p><?php the_excerpt(); ?></p>
            <p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary" role="button">
                    read more
                </a>
            </p>
        </div>

    </div>

</div>
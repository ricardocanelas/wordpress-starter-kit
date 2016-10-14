<div class="col-xs-12 <?= Util::get_post_class('content-single') ?>">

    <div class="project-container">

        <b><a href="<?= get_permalink() ?>"><?php the_title(); ?></a></b><br/>

        <small><?php echo get_the_date('M d, Y'); ?></small>

        <p><?php the_excerpt() ?></p>

    </div>

</div>


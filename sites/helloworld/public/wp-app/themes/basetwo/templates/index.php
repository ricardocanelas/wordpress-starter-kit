<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1>Blog</h1>
        </div>
    </div>
</div>

<div class="row">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
    <?php endwhile; ?>
</div>

<div class="row">
    <button type="button"
            class="btn btn-default"
            data-toggle="tooltip"
            data-placement="top"
            title="Tooltip on top"
    >Tooltip on top</button><br/>
</div>
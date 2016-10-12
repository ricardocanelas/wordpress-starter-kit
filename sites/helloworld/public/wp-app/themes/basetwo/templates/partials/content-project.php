<div class="col-xs-12 project project-<?= get_the_ID() ?>">
    <div class="project-container">
        <!-- title -->
        <b>
            <a href="<?= get_permalink() ?>">
                <?php the_title(); ?>
            </a>
        </b>
        <br/>

        <!-- date -->
        <small>
            <?php echo get_the_date('M d, Y'); ?>
        </small>

        <!-- excerpt -->
        <p><?php the_excerpt() ?></p>

    </div>
</div>


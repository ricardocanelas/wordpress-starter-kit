<div class="col-xs-12 project-<?= get_the_ID() ?>">

    <!-- title -->
    <h3>
        <a href="<?= get_permalink() ?>">
            <?php the_title(); ?>
        </a>
    </h3>

    </hr>

    <!-- date -->
    <?php echo get_the_date('M d, Y'); ?>

    <!-- excerpt -->
    <?php  the_excerpt() ?>

</div>


<article <?php post_class(); ?> >

    <!-- title -->
    <b>
        <a href="<?= get_permalink() ?>">
            <?php the_title(); ?>
        </a>
    </b>

    <br/>

    <!-- date -->
    <?php echo get_the_date('M d, Y'); ?>

    <!-- excerpt -->
    <?php  the_excerpt() ?>

</article>


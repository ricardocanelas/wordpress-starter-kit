

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

    <div class="entry-terms">
        <?php
        $terms = wp_get_post_terms(get_the_ID(), 'category', array("fields" => "all"));

        echo '<ul>';

        foreach ( $terms as $term ) {

            // The $term is an object, so we don't need to specify the $taxonomy.
            $term_link = get_term_link( $term );

            // If there was an error, continue to the next term.
            if ( is_wp_error( $term_link ) ) {
                continue;
            }

            // We successfully got a link. Print it out.
            echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
        }

        echo '</ul>'
        ?>
    </div>


    <div class="entry-tags">
        <?php
        $tags = get_the_tags();

        echo '<ul>';

        if($tags) {
            foreach ($tags as $tag) {

                // The $tag is an object, so we don't need to specify the $tag.
                $tag_link = get_term_link($tag);

                // If there was an error, continue to the next tag.
                if (is_wp_error($tag_link)) {
                    continue;
                }

                // We successfully got a link. Print it out.
                echo '<li><a href="' . esc_url($tag_link) . '">' . $tag->name . '</a></li>';
            }
        }

        echo '</ul>'
        ?>
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

<div class="row">

    <div class="col-xs-12">
        <div class="pull-left">
            <a class="brand" href="<?= esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>

        <div class="pull-left">
            <nav class="nav-primary">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills']);
                endif;
                ?>
            </nav>
        </div>
    </div>

</div>
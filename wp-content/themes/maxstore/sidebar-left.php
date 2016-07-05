<?php
    if (get_theme_mod( 'left-sidebar-check', 0 ) != 0 ) : ?>
    <aside id="sidebar-secondary" class="col-md-<?php echo esc_attr(get_theme_mod( 'left-sidebar-size', 3 )); ?> rsrc-left" role="complementary">
        <?php dynamic_sidebar( 'Left Sidebar' ); ?>
    </aside>
<?php endif; ?>
<?php
    if (get_theme_mod( 'rigth-sidebar-check', 1 ) != 0 ) : ?>
    <aside id="sidebar" class="col-md-<?php echo esc_attr(get_theme_mod( 'right-sidebar-size', 3 )); ?> rsrc-right" role="complementary">
        <?php //get the right sidebar
        dynamic_sidebar( 'Right Sidebar' ); ?>
    </aside>
<?php endif; ?>
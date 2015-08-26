<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class="sidebar-nav" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/logofull.png" class="logo"></a> 
                </li>

                <?php /* Primary navigation */
                    wp_nav_menu( array(
                      'menu' => 'top_menu',
                      'depth' => 2,
                      'container' => false,
                      'menu_class' => 'nav',
                      //Process nav menu using our custom nav walker
                      'walker' => new wp_bootstrap_navwalker())
                    );
                ?>
                <span class="credits"> &copy; Willey Printing Ltd. 2015</span>
            </ul>
        </div>
</div>
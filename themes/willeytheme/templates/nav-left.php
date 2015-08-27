<div id="wrapper">
        <!-- Sidebar -->

        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class="sidebar-nav" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/logofull.png" class="logo"></a> 
                </li>
                <br><br>
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
                <br>
                <a class="sidebar-bottom" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook_mono.png" class="sidebar-bottom"></a>
                <a class="sidebar-bottom" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/linkedin_mono.png" class="sidebar-bottom"></a>
                <a class="sidebar-bottom" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email_mono.png" class="sidebar-bottom"></a>
                <a class="sidebar-bottom" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/upload_mono.png" class="sidebar-bottom"></a>
                <br><br><br>
                <a class="language" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/english.png" class="language"></a>
                <a class="language" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/chinese.png" class="language"></a>
                <br>
                <span class="credits"> &copy; Willey Printing Ltd. 2015</span>
            </ul>

        </div>
      <div class="menu-close">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button"></a>
      </div>
<!-- </div> -->
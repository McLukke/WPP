<div id="wrapper"> -->
        <!-- Sidebar -->

      <div class="nav-space"></div>
      <div id="sidebar-wrapper">

          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <a href="<?php echo get_home_url(); ?>"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/logofull.png" class="logo"></a>
              </li>
              <li>
                <br /><?php /* Primary navigation */
                    wp_nav_menu( array(
                      'menu' => 'top_menu',
                      'depth' => 2,
                      'container' => false,
                      'menu_class' => 'nav',
                      'link_before' => '<p class="nav_menu_items">',
                      'link_after' => '</p>',
                      //Process nav menu using our custom nav walker
                      'walker' => new wp_bootstrap_navwalker())
                    ); ?>
              </li>
              <br>
              <a class="grayscale" id="share1" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook.png" class="sidebar-bottom"></a>
              <a class="grayscale" id="share2" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/linkedin.png" class="sidebar-bottom"></a>
              <a class="grayscale" id="share3" href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email.png" class="sidebar-bottom"></a>
              <!-- <a class="grayscale" id="share4" href="#"><img src="<?php //echo bloginfo('template_directory'); ?>/assets/images/icons/upload.png" class="sidebar-bottom"></a> -->
          </ul>
          <div class="menu_bottom">
            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
            <!-- <a class="language" href="#"><img src="<?//php echo bloginfo('template_directory')?>/assets/images/icons/english.png" class="language"></a>
            <a class="language" href="#"><img src="<?//php echo bloginfo('template_directory')?>/assets/images/icons/chinese.png" class="language"></a> -->
            <br>
            <span class="credits"> &copy; Willey Printing Ltd. 2015</span>
          </div>
      </div>
      <div class="menu-close">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button"></a>
      </div>
<!-- </div>
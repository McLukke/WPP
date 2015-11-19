<!-- <div id="wrapper">
 -->        <!-- Sidebar -->

      <div class="nav-space"></div>
      <div id="sidebar-wrapper">

          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <a href="<?php echo get_home_url(); ?>"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/logofull.png" class="logo"></a>
              </li>
              <li>
                <?php /* Primary navigation */
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
              <li class="nav-icons">
                <a href="#" class="nav-icon"><img id="menu_share1" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook_mono.png" class="sidebar-bottom"></a>
                <a href="#" class="nav-icon"><img id="menu_share2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/linkedin_mono.png" class="sidebar-bottom"></a>
                <a href="#" class="nav-icon"><img id="menu_share3" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email_mono.png" class="sidebar-bottom"></a>
                <!-- <a class="grayscale" id="share4" href="#"><img src="<?php //echo bloginfo('template_directory'); ?>/assets/images/icons/upload.png" class="sidebar-bottom"></a> -->
              </li>

            <li class="menu_bottom">
              <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
              <!-- <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/english.png" class="language"></a>
              <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/chinese.png" class="language"></a> -->
              <br>
              <span class="credits">
                Copyright &copy; Willey Printing <?php echo date("Y"); ?>.<br/> All rights reserved.
              </span>
            </li>
          </ul>
          <div class="menu_language">
            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
            <!-- <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/english.png" class="language"></a>
            <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/chinese.png" class="language"></a> -->
            <br>
            <span class="credits">
                Copyright &copy; Willey Printing <?php echo date("Y"); ?>.<br/> All rights reserved.
            </span>
          </div>
      </div>
      <div class="menu-close">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button"></a>
      </div>
<!-- </div>
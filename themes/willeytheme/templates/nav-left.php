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
                <a href="https://www.facebook.com/Willey-Printing-Ltd-1676450059265121/" target="_blank" class="nav-icon"><img id="menu_share1" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook_mono.png" class="sidebar-bottom"></a>
                <a href="https://www.linkedin.com/company/willey-printing-ltd" target="_blank" class="nav-icon"><img id="menu_share2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/linkedin_mono.png" class="sidebar-bottom"></a>
                <a href="/contact-us" target="_blank" class="nav-icon"><img id="menu_share3" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email_mono.png" class="sidebar-bottom"></a>
                <!-- <a class="grayscale" id="share4" href="#"><img src="<?php //echo bloginfo('template_directory'); ?>/assets/images/icons/upload.png" class="sidebar-bottom"></a> -->
              </li>

            <li class="menu_bottom">
              <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
              <!-- <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/english.png" class="language"></a>
              <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/chinese.png" class="language"></a> -->
              <br>
              <span class="credits">
                <span class="en-only">
                  Copyright &copy; Willey Printing <?php echo date("Y"); ?>.<br/> All rights reserved.
                </span>
                <span class="zh-only">
                  Copyright &copy; 偉利印藝 <?php echo date("Y"); ?>.<br/> 版權所有
                </span>
              </span>
            </li>
          </ul>
          <div class="menu_language">
            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
            <!-- <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/english.png" class="language"></a>
            <a class="language" href="#"><img src="<?php //echo bloginfo('template_directory')?>/assets/images/icons/chinese.png" class="language"></a> -->
            <br>
            <span class="credits">
              <span class="en-only">
                Copyright &copy; Willey Printing <?php echo date("Y"); ?>.<br/> All rights reserved.
              </span>
              <span class="zh-only">
                Copyright &copy; 偉利印藝 <?php echo date("Y"); ?>.<br/> 版權所有
              </span>
            </span>
          </div>
      </div>
      <div class="menu-close">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button"></a>
      </div>
<!-- </div>

<?php include("nav_left.php"); ?>
<header class="banner" role="banner">
  <div class="container">
    <div class="row text-center">

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="left_menu" src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2015/08/menu.png" alt="Main Menu" /></a>
      </div>

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="main_logo" src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2015/08/<?php 
          // if () {
            echo "logofull.png";
          // } else {
          //   echo "logo.png";
          // }
        ?>" alt="Main Menu" /></a>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="right_menu" src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2015/08/folder.png" alt="Side Menu" /></a>
      </div>
    </div>

<!--
    <nav role="navigation">
      <?php
      // if (has_nav_menu('primary_navigation')) :
      //   wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      // endif;
      ?>
    </nav>
-->
  </div>
</header>

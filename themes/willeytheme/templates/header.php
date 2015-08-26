<?php include("nav-left.php"); ?>
<?php include("nav-right.php"); ?>
<header class="banner" role="banner">
  <div class="container-fluid">
    <div class="row text-center">

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="left_menu" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/menu.png" alt="Main Menu" /></a>
      </div>

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="main_logo" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/<?php 
          if ( is_home() ) {
            echo "logofull.png";
          } else {
            echo "logo.png";
          }
        ?>" alt="Main Menu" /></a>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="right_menu" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/<?php
          global $post;
          if ( is_home() || $post->ID === "work" ) {
            echo "folder.png";
          } else if ( $post->ID === "journey" ) {
            echo "publish.png";
          } else {}

// if above doesn't work, try:
// $page=get_page_by_title($page_name);
// This provides the entire page record. $page->ID is the id

        ?>" alt="Side Menu" /></a>
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

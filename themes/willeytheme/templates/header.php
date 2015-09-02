<?php include("nav-left.php"); ?>
<?php include("nav-right.php"); ?>
<header id="header" class="banner" role="banner">
  <div class="container-fluid">
    <div class="row text-center">

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="left_menu_button" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/menu.png" alt="Main Menu" /></a>
      </div>

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <a href="<?= esc_url(home_url('/')); ?>"><img id="main_logo" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/<?php
            if ( is_front_page() ) {
              echo "logofull.png";
            } else {
              echo "logo.png";
            }
          ?>" alt="Main Menu" /></a>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="<?= esc_url(home_url('/')); ?>"><?php 
          if ( is_front_page() || is_page('work') ) { ?>
            <img id="right_menu_button" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/folder.png" alt="Side Menu" />
          <?php } else if ( is_page('journey') ) { ?>
            <img id="right_menu" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" alt="Side Menu" />
          <?php } else {

          } ?>
        </a>
      </div>
    </div>
    
  </div>
</header>

<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container-fluid" role="document">
      <div class="content row">
        <div id="wrapper">

          <!-- <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"> -->
          <?php include('templates/nav-left.php'); ?>
          <!-- </div> -->

          <!-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"> -->
            <main class="main full-width" role="main">
              <?php include Wrapper\template_path(); ?>
            </main><!-- /.main -->
          <!-- </div> -->

          <!-- <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"> -->
          <?php // include('templates/nav-right.php'); ?>
          <!-- </div> -->

          <?php if (Config\display_sidebar()) : ?>
            <aside class="sidebar" role="complementary">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>

        <!-- /#wrapper -->
        </div>
      </div><!-- /.content row -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>

<?php $posts = query_posts($query_string . '&orderby=rand&posts_per_page=60&post_type=work'); ?>
<?php
  if ( !empty($_GET['sorting']) ) {
    $sorting = $_GET['sorting'];
  } else if ( !empty($_GET['brand']) ) {
    $brand = $_GET['brand'];
  } else {
    $sorting = null;
    $brand = null;
  }
?>

<!-- right menu -->
<div class="container-fluid">
<div class="row text-center">
<div class="right_work_menu">
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
  <a href="#">
    <img class="right_menu_button" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/folder_bnw.png" alt="Side Menu" />
    <img class="right_menu_button_white" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/folder_white.png" alt="Side Menu" />
  </a>
</div>
</div></div></div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="packery js-packery" data-packery-options='{ "gutter": 0, "itemSelector": ".item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
  <div class="gutter-sizer"></div>
  <div class="grid-sizer"></div>
  <?php
  $how_many_posts=0;
  $count=1;

  while (have_posts()) : the_post();

    switch ($count) {
      case 1:
          $class = "";
        break;
      case 2:
          $class = "sm_half";
        break;
      case 3:
          $class = "wide sm_half";
        break;
      case 4:
          $class = "extra_tall extra_wide";
        break;
      case 5:
          $class = "extra_extra_wide tall sm_half";
        break;
      case 6:
        $class = "sm_half";
        break;
      case 7:
        $class = "last_div";
        break;
    }

    if ( $sorting === null && $brand === null) {
      display_post_details($post->ID, $class);

      if($count%7==0) {
        $count = 0;
      }
      if($count < 7){
        $count ++;
      }
      $how_many_posts ++;
    } else if ( $sorting === null && !empty($brand) ) {
      $post_terms = wp_get_post_terms ($post->ID, 'workbrand');
      $current_post_custom_category = $post_terms[0]->slug;
      if ( $current_post_custom_category === $brand ) {
        display_post_details($post->ID, $class);

        if($count%7==0) {
          $count = 0;
        }
        if($count < 7){
          $count ++;
        }
        $how_many_posts ++;
      }
    } else if ( $brand === null && !empty($sorting) ) {
      $post_terms = wp_get_post_terms ($post->ID, 'workcategory');
      $current_post_custom_category = $post_terms[0]->slug;
      if ( $current_post_custom_category === $sorting ) {
        display_post_details($post->ID, $class);

        if($count%7==0) {
          $count = 0;
        }
        if($count < 7){
          $count ++;
        }
        $how_many_posts ++;
      }
    }
  endwhile;
  if ( $how_many_posts === 0 ) { ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form();
  } ?>
</div>
<?php include('templates/nav-right.php'); ?>
<?php the_posts_navigation(); ?>


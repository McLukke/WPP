<?php
/**
 * Template Name: Journey Template
 */
?>
<div id="journey_page" class="container-fluid">
  <?php $args = array ( 'numberposts' => -1 );
  $all_posts = get_posts ( $args );
  if ( $all_posts ) {
    foreach ( $all_posts as $post ) {
      setup_postdata($post); ?>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
          <?php if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
          } else {
            $image = bloginfo('template_directory')."/wp-content/themes/willeytheme/assets/images/icons/black.png";
          } ?>
          <div class="journey_feat_image" style="background-image: url('<?php echo $image; ?>');"></div>

          <?php the_title('<h1>', '</h1>'); ?>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
          <div class="journey_blurb"><?php the_excerpt(); ?></div>
        </div>

        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
          <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
          <p class="journey-date"><?php the_time('M Y ') ?></p>
        </div>
      </div>

      <div class="row social_share_wrapper">
        <div class="col-xs-6 col-sm-6 divider">
          <div class="social_share_journey">
            <p>Share by:</p><br />
            <a href="">
              <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email.png" />
            </a>
            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
              <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook.png" />
            </a>
            <a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" />
              <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/twitter.png" />
            </a>
            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
              <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/google.png" />
            </a>
            <a href="">
              <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/weibo.png" />
            </a>
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 hidden-md hidden-lg">
          <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
          <p class="journey-date">PUBLISH TIME<?php the_time('M Y ') ?></p> <!--<?php  esc_html(get_the_date()); ?> echo-->
        </div>
      </div>
    <?php }
  } ?>
</div>
<?php include('nav-right.php'); ?>

<?php
/**
 * Template Name: Journey Template
 */
?><?php
  if ( !empty($_GET['id']) ) {
    echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>';
    echo '<script type="text/javascript">'
      , "window.onload=function() {
          $('html,body').animate({
            scrollTop: $('#" . $_GET['id'] . "').offset().top
          }, 1000);
        };"
      , '</script>';
  }
?><div id="journey_page">
  <?php $args = array ( 'numberposts' => -1 );
  $all_posts = get_posts ( $args );
  if ( $all_posts ) {
    foreach ( $all_posts as $post ) {
      setup_postdata($post); ?>

      <div id="<?php the_ID(); ?>" class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
          <?php if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
          } else {
            $image = get_bloginfo('template_directory')."/assets/images/icons/black.png";
          } ?>
          <div class="journey_feat_image" style="background-image: url('<?php echo $image; ?>');"></div>
        </div>
      </div>
      <div class="content-padding">
        <?php the_title('<h1>', '</h1>'); ?>
        <div class="row content_info_wrapper">
          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="journey_blurb"><?php the_content(); ?></div>
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
                <a href="mailto:voilah@mailnesia.com?Subject=<?php echo the_title(); ?>" target="_top">
                  <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email.png" />
                </a>  
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_home_url() . "/journey/%3Fid%3D" . $post->ID; ?>" rel="nofollow" target="_blank">
                  <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook.png" />
                </a>
                <a href="https://twitter.com/intent/tweet?source=webclient&amp;original_referer=<?php echo get_home_url(); ?>;text=&amp;url=<?php echo get_home_url() . "/journey/?id=" . $post->ID; ?>; rel="nofollow" target="_blank"">
                  <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/twitter.png" />
                </a>
                <a href="https://plus.google.com/share?url=<?php echo get_home_url() . "/journey/?id=" . $post->ID; ?>" rel="nofollow" target="_blank">
                  <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/google.png" />
                </a>
                <a href="http://service.weibo.com/share/share.php?title=<?php the_title(); ?>&amp;url=<?php echo get_home_url() . "/journey/?id=" . $post->ID; ?>" rel="nofollow" target="_blank">
                  <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/weibo.png" />
                </a>
            </div>
          </div>

          <div class="col-xs-6 col-sm-6 hidden-md hidden-lg">
            <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
            <p class="journey-date"><?php the_time('M Y ') ?></p> <!--<?php  esc_html(get_the_date()); ?> echo-->
          </div>
        </div>
      </div>
    <?php }
  } ?>
<?php include('nav-right.php'); ?>
</div>


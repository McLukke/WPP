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
      <div class="content-padding journey-content">
        <?php the_title('<h1>', '</h1>'); ?>
        <div class="row content_info_wrapper">
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="journey_blurb"><?php the_content(); ?></div>
          </div>

          <div class="hidden-xs hidden-sm col-md-4 col-lg-4 journey-date-box">
            <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
            <p class="journey-date"><?php the_time('M Y ') ?></p>
          </div>
        </div>

        <div class="row social_share_wrapper">
          <div class="col-xs-6 col-sm-6 divider">
            <div class="social_share_journey">
              <p>Share by:</p><br />
              <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
                ADDTOANY_SHARE_SAVE_KIT( array( 'linkname' => ( is_home() ? get_bloginfo( 'description' ) : wp_title( '', false ) ), 'linkurl' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'] ) );
              } ?>
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


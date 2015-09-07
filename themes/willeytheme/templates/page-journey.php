<?php
/**
 * Template Name: Journey Template
 */
?>
<div id="journey_page" class="container-fluid">
<div class="row">

<div class="feature_image">
</div>

<div class="journey_text">
  <div class="col-xs-12 col-sm-7">
    <div class="journey_content">
      <?php
        $args = array ( 'numberposts' => -1 );
        $all_posts = get_posts ( $args );
        if ( $all_posts ) {
          foreach ( $all_posts as $post ) {
            setup_postdata($post);

            the_title('<h1>', '</h1>');
            the_excerpt('<p>', '</p>');
          }
        }
      ?>
    </div>
  </div>

  <div class="col-xs-12 col-sm-5">
    <div class="desktop_publish_time">
      <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect.png" />
      <h2>PUBLISH TIME</h2><br />
      <p><?php echo esc_html(get_the_date()); ?></p>
    </div>
  </div>
</div>


</div>

<div class="row">
  <div class="col-xs-6 col-sm-7">
    <div class="social_share">
      <p>Share by:</p>
      <a href="">
        <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/email.png" />
      </a>
      <a href="">
        <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/google.png" />
      </a>
      <a href="">
        <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/twitter.png" />
      </a>
      <a href="">
        <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/google.png" />
      </a>
      <a href="">
        <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/weibo.png" />
      </a>
    </div>
  </div>

  <div class="col-xs-6 col-sm-5">
    <div class="mobile_publish_time">
      <img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect.png" />
      <h2>PUBLISH TIME</h2><br />
      <p><?php echo esc_html(get_the_date()); ?></p>
    </div>
  </div>
</div>
</div>

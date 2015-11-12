<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

<div class="entry-content">
    <div class="work_container">

<div class="container-fluid">
<div class="row text-center">
<div class="right_work_menu">
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
  <a href="#">
      <img class="single-work-exit-button" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" onclick="location.href='<?php echo get_home_url(); ?>';" />
      <img id="work_single_return" class="right_menu_button" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/return.png" onclick="location.href='<?php echo get_home_url(); ?>';" />
  </a>
</div>
</div></div></div>

      <div class="content-single-work container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1 class="title-single-work"><?php single_post_title(); //+get_the_ID(); ?></h1>
          </div>
        </div>
        <!--end row-->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p><?php the_excerpt() ?></p>
          </div>
          <div class="hidden-xs hidden-sm col-md-6 col-lg-6 borderdiv">
             <div class="work-icon-assets">
              <img class="work-details-info-icon2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/paper.png" />
              <p class="link-not-active-journey">PAPER</p>
              <p class="link-not-active-journey clearfix"><?php the_terms( $post->ID, 'paper'); ?></p>
            </div>
              <!--end cat-->

            <div class="work-icon-assets">
              <img class="work-details-info-icon2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect.png" />
              <p class="link-not-active-journey">PRINTING EFFECT</p>
              <p class="link-not-active-journey clearfix"><?php the_terms( $post->ID, 'printingeffect'); ?></p>
            </div>
              <!--end cat-->


            <div class="work-icon-assets">
              <img class="work-details-info-icon2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
              <p class="link-not-active-journey">PUBLISH TIME</p>
              <p class="link-not-active-journey clearfix"><?php echo esc_html(get_the_date()); ?></p>
            </div>
              <!--end cat-->


          </div>
        </div>
        <!--end row-->

        <div class="row details-box">
            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
              <div class="social_share">
              <p>Share by:</p><br />
              <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
                ADDTOANY_SHARE_SAVE_KIT( array( 'linkname' => ( is_home() ? get_bloginfo( 'description' ) : wp_title( '', false ) ), 'linkurl' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'] ) );
              } ?>
              </div>
              <!--end social_share-->
            </div>

          <div class="col-xs-6 col-sm-6 hidden-md hidden-lg borderdiv">
            <div class="work-icon-assets">
              <img class="work-details-info-icon2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
              <p class="link-not-active-journey">PUBLISH TIME</p>
              <p class="link-not-active-journey clearfix"><?php echo esc_html(get_the_date()); ?></p>
            </div>
              <!--end cat-->
            <div class="work-icon-assets">
              <img class="work-details-info-icon2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect.png" />
              <p class="link-not-active-journey">PRINTING EFFECT</p>
              <p class="link-not-active-journey clearfix"><?php the_terms( $post->ID, 'printingeffect'); ?></p>
            </div>
              <!--end cat-->
            <div class="work-icon-assets">
              <img class="work-details-info-icon2" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/paper.png" />
              <p class="link-not-active-journey">PAPER</p>
              <p class="link-not-active-journey clearfix"><?php the_terms( $post->ID, 'paper'); ?></p>
              <!--end cat-->
            </div>
          </div>
        </div>
        <!--end row details-box-->
      </div>
      <!--end container-fluid-->
          <div class="img-box">
            <?php the_post_thumbnail( 'full', array( 'alt' => 'Responsive image', 'class' => 'image-full-width' ) ); ?>
            <?php the_content() ?>
          </div>
          <!--end img-box-->
    </div>
    <!--end work_container-->
</div>
<!--end entry-content-->

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>

  </article>
<?php endwhile; ?>

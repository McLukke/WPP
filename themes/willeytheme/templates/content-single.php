<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
    </header>

<div class="entry-content">
    <div class="work_container">
      <div class="content-single-work container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1 class="title-single-work"><?php single_post_title()+get_the_ID(); ?></h1>
          </div>
        </div> 
        <!--end row-->
        <div class="row details-box">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="social_share_content_single">
              <p>Share by:</p><br />
              <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
                ADDTOANY_SHARE_SAVE_KIT( array( 'linkname' => ( is_home() ? get_bloginfo( 'description' ) : wp_title( '', false ) ), 'linkurl' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'] ) );
              } ?>
              </div>
              <!--end social_share--> 
            </div> 
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
              <p class="journey-date"><?php the_time('M Y ') ?></p>
              <!--end cat-->   
            </div>
        </div>
        <!--end row details-box-->
        <div class="row details-box">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p><?php the_content() ?></p>
          </div>
        </div>

    </div>
    <!--end work_container--> 
</div>
<!--end entry-content--> 

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    
  </article>
<?php endwhile; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
    </header>

<div class="entry-content">
    <div class="work_container">
      <div class="content-single-work container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1><?php single_post_title()+get_the_ID(); ?></h1>
          </div>
        </div> 
        <!--end row-->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p><?php the_content() ?></p>
          </div>
          <div class="hidden-xs hidden-sm col-md-6 col-lg-6">
            <div class="work-icon-assets">
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
              <p>PUBLISH TIME<br />
              <div class=""><?php echo esc_html(get_the_date()); ?></div></p>  <br />
              <!--end cat-->       
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect.png" />
              <p>PRINTING EFFECT<br />
              <div class=""><?php the_terms( $post->ID, 'printingeffect'); ?></div></p><br />
              <!--end cat-->         
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/paper.png" />
              <p>PAPER<br />
              <div class="."><?php the_terms( $post->ID, 'paper'); ?></div></p>
              <!--end cat-->
            </div> 
          </div>
        </div>
        <!--end row-->

        <div class="row details-box">
            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
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
              <!--end social_share--> 
            </div> 

            <div class="col-xs-6 col-sm-6 hidden-md hidden-lg">
              <div class="work-icon-assets">
                <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
                <p>PUBLISH TIME<br />
                <div class=""><?php echo esc_html(get_the_date()); ?></div></p><br />
                <!--end cat-->       
                <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect.png" />
                <p>PRINTING EFFECT<br />
                <div class=""><?php the_terms( $post->ID, 'printingeffect'); ?></div></p><br />
                <!--end cat-->         
                <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/paper.png" />
                <p>PAPER<br />
                <div class="."><?php the_terms( $post->ID, 'paper'); ?></div></p>
                <!--end cat-->
              </div>
              <!--end work-icon-assets--> 
            </div>
        </div>
        <!--end row details-box-->
      </div>
      <!--end container-fluid--> 
          <div class="img-box">
            <?php the_post_thumbnail( 'full', array( 'alt' => 'Responsive image', 'class' => 'image-full-width' ) ); ?>
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

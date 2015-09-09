<?php // get_template_part('templates/page', 'header'); ?>

<!--Left nav
  <div class="row">
      <div class="col-md-4 col-sm-4">
      <?php // get_template_part('templates/page', 'header'); ?>
    </div>
  </div>
Left nav ends-->
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

      if (has_post_thumbnail( $post->ID ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $image = $image[0]; ?>

        <div class="item <?php echo $class; ?>" style="background-image: url('<?php echo $image; ?>')">

          <div class="hover_text" onclick="location.href='<?php the_permalink(); ?>';">
            <?php the_title('<h3>','</h3>'); ?>
            <div class="work-details-info">
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish_bnw.png" />
              <p>PUBLISH TIME<br /><div class="link-not-active"><?php echo esc_html(get_the_date()); ?></div></p>
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect_bnw.png" />
              <p>PRINTING EFFECT<br /><div class="link-not-active"><?php the_terms( $post->ID, 'printingeffect'); ?></div></p>
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/paper_bnw.png" />
              <p>PAPER<br /><div class="link-not-active"><?php 
                  the_terms( $post->ID, 'paper'); 
              ?></div></p>
            </div>
          </div>
        </div>
      <?php      
      }
      
      if($count%7==0) {
        $count = 0;
      }
      if($count < 7){
        $count ++;
      }
    

      endwhile; ?>
</div>
<?php the_posts_navigation(); ?>
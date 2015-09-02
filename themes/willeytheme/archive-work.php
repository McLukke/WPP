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
      $count = 1;

      while (have_posts()) : the_post(); 
      
        switch ($count) {
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
          <?php the_title('<h2>','</h2>'); ?>
            <div class="work-details-info">
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish_bnw.png" />
              <h3><strong>PUBLISH TIME</strong></h3>
              <p><?php echo esc_html(get_the_date()); ?></p>
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/printing_effect_bnw.png" />
              <h3><strong>PRINTING EFFECT</strong></h3>
              <p class="link-not-active"><?php the_terms( $post->ID, 'printingeffect'); ?></p>
              <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/paper_bnw.png" />
              <h3><strong>PAPER</strong></h3>
              <p class="link-not-active"><?php the_terms( $post->ID, 'paper'); ?></p>
            </div>
          </div>
        </div>
      <?php      
      }
      
      $count ++;

      endwhile; ?>
</div>
<?php the_posts_navigation(); ?>
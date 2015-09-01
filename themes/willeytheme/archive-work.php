<?php get_template_part('templates/page', 'header'); ?>

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
        case 3:
            $class = "wide";
            break;
        case 4:
            $class = "tall";
            break;
        case 5:
            $class = "extraWide";
            break;
        }

     if (has_post_thumbnail( $post->ID ) ) {
   $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
  $image = $image[0]; ?>

<div class="item <?php echo $class?>" style="background-image: url('<?php echo $image; ?>')">
<div class="thing"  ></div>

<!--        if ( has_post_thumbnail() ) { ?>
          <div class="item">
            <div class="thing">
                <?php the_post_thumbnail(); ?>
            </div>  
          </div> -->
      </div>
      <?php      
      }
      $count ++;

      endwhile; ?>
      <!-- </div> -->
      <!-- </div> -->

  <!-- </div> -->
</div>
<?php the_posts_navigation(); ?>
<?php $posts = query_posts($query_string . '&orderby=rand'); ?>

<?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>

<div class="">

  <div class="packery js-packery client_page" data-packery-options='{ "gutter": 0, "itemSelector": ".item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
    <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>
      <?php
      $count = 1;
      $color = "#000000";

      while (have_posts()) : the_post();

        switch ($count) {
        case 4:
        case 3:
        case 9:
        case 13:
            $class = "two";
            break;
        case 6:
            $class = "six";
            break;
        case 11:
            $class = "four";
            break;
        default:
            $class = "";
        }?>

        <p style="color:white">
        <?php

          if( get_post_meta($post->ID,'background_color',true)){
            $color = get_post_meta($post->ID,'background_color',true);
          }else{
            $color = "#000000";
          }

          ?>
      </p>

      <?php

      if (has_post_thumbnail( $post->ID ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $image = $image[0]; ?>

        <div class="item <?php echo $class; ?>" style="background-image: url('<?php echo $image; ?>'); background-color: <?php echo $color; ?> ">
          <?php
          $books = pods( 'client', $params );
          echo $books->field( 'background_color' );
          /* <div class="hover_text"  > */ ?>
          <?php //the_title( '<h1>', '</h1>' ); ?>
          <?php //the_title( $count ); ?>
          <!-- </div> -->

        </div>
      <?php
      }

      $count ++;

      endwhile; ?>
</div>

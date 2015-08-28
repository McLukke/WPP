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

<?php while (have_posts()) : the_post(); ?>

  <br/>
  <?php the_title(); ?>
  <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    } ?>
    <br/>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>

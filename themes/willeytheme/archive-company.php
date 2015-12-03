<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>


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

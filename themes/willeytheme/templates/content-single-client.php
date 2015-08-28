<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title">H#LLO <?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
    ------------------------------
    <?php the_content(); ?>
    ------------------------------
    <?php echo pods_field_display ('client', get_the_ID(), 'english_editor'); ?>
    ------------------------------
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    } ?>
    ------------------------------
      
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

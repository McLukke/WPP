<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content">
      <div class="company_toggle_buttons">
        <img id="about_button" class="ON" src="/wp-content/themes/willeytheme/assets/images/icons/about.png" />
        
        <img id="mission_button" src="/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png" />
        
        <img id="sustain_button" src="/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png" />
      </div>

      <?php
        $params = array ('limit' => -1);
        $pods = pods('company', $params);
        if ( $pods->total() > 0 ) {
          while ( $pods->fetch() ) {
          // loop through pictures
            $picturesID = $pods->field('about_willey_images');
            foreach ($picturesID as $pictureID) { ?>
              <div class="about_willey_images">
              <?php echo pods_image($pictureID); ?>
              </div>
            <?php } ?>

          <!--About Willey Printing-->
            <div class="about_popup">
              <h1><?php echo $pods->display('about_willey_title'); ?></h1>
              <span><p><?php echo $pods->display('about_willey_text'); ?></p><span>
            </div>

          <!--Mission Statement-->
            <div class="mission_popup hidden">
              <h1><?php echo $pods->display('mission_statement_title'); ?></h1>
            <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <span><h2><?php echo $pods->display('mission_column1_title'); ?></h2>
              <p><?php echo $pods->display('mission_column1'); ?></p></span>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <span><h2><?php echo $pods->display('mission_column2_title'); ?></h2>
              <p><?php echo $pods->display('mission_column2'); ?></p></span>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <span><h2><?php echo $pods->display('mission_column3_title'); ?></h2>
              <p><?php echo $pods->display('mission_column3'); ?></p></span>
            </div>

            </div>
            </div>

          <!--Sustainability-->
            <div class="sustainability_popup hidden">
              <h1><?php echo $pods->display('sustainability_title'); ?></h1>
            <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <span><h2><?php echo $pods->display('sustainability_column1_title'); ?></h2>
              <p><?php echo $pods->display('sustainability_column1'); ?></p></span>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <span><h2><?php echo $pods->display('sustainability_column2_title'); ?></h2>
              <p><?php echo $pods->display('sustainability_column2'); ?></p></span>
            </div>

            </div>
            </div>
          <?php }
        }
        ?>




    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

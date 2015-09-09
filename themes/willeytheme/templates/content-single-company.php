<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content2">

    <div class="about_mobile">
      <?php
        $params = array ('limit' => -1);
        $pods = pods('company', $params);
        if ( $pods->total() ) {
        while ( $pods->fetch() ) {
          $pictureArray = $pods->field('about_willey_images'); ?>

      <div class="mobile_image" style="background-image:url(<?php echo pods_image_url($pictureArray[0], 'full'); ?>)"></div>
      <div class="mobile_text">
        <h1><?php echo $pods->display('about_willey_title'); ?></h1>
        <p><?php echo $pods->display('about_willey_text'); ?></p>
      </div>

      <div class="mobile_image" style="background-image:url(<?php echo pods_image_url($pictureArray[1], 'full'); ?>)"></div>
      <div class="mobile_text">
        <h1><?php echo $pods->display('mission_statement_title'); ?></h1>
        <div class="row">
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h2><?php echo $pods->display('mission_column1_title'); ?></h2>
            <p><?php echo $pods->display('mission_column1'); ?></p>
          </div>

          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h2><?php echo $pods->display('mission_column2_title'); ?></h2>
            <p><?php echo $pods->display('mission_column2'); ?></p>
          </div>

          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h2><?php echo $pods->display('mission_column3_title'); ?></h2>
            <p><?php echo $pods->display('mission_column3'); ?></p>
          </div>
        </div>
      </div>

      <div class="mobile_image" style="background-image:url(<?php echo pods_image_url($pictureArray[2], 'full'); ?>)"></div>
      <div class="mobile_text">
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
      } ?>
    </div>

    <div class="about_desktop">
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

            $counter = 1; ?>
            <div class="about_bg"><?php
            foreach ($picturesID as $pictureID) { ?>
              <div class="image<?php echo $counter; ?>" style="background-image:url(<?php echo pods_image_url($pictureID, 'full'); ?>)">
              </div>
            <?php $counter ++;
            } ?>
            </div>

            <?php $counter = 1; ?>
            <div class="mission_bg hidden"><?php
            foreach ($picturesID as $pictureID) { ?>
              <div class="image<?php echo $counter; ?>" style="background-image:url(<?php echo pods_image_url($pictureID, 'full'); ?>)">
              </div>
            <?php $counter ++;
            } ?>
            </div>

            <?php $counter = 1; ?>
            <div class="sustain_bg hidden"><?php
            foreach ($picturesID as $pictureID) { ?>
              <div class="image<?php echo $counter; ?>" style="background-image:url(<?php echo pods_image_url($pictureID, 'full'); ?>)">
            </div>
            <?php $counter ++;
            } ?>
            </div>

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
        } ?>
    </div>

    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content2">

    <?php
      $params = array ('limit' => -1);
      $pods = pods('company', $params);
      if ( $pods->total() ) :
      while ( $pods->fetch() ) :
        $picArray = $pods->field('about_willey_images');
        $numOfPictures = count($picArray);

        $picturesArray = [];
        if ( $numOfPictures < 7 ) {
          // put the first X pictures into the picturesArray
          foreach ($picArray as $picture) {
            array_push( $picturesArray, pods_image_url($picture, 'full') );
          }

          // fill the rest of the array with black.png up to 7th spot
          for ($i=$numOfPictures+1; $i<=7; $i++) {
            array_push( $picturesArray, get_bloginfo('template_directory').'/assets/images/icons/black.png' );
          }
        } else {
          foreach ($picArray as $picture) {
            array_push( $picturesArray, pods_image_url($picture, 'full') );
          }
        }

        // to label each image on desktop
        $counter = 1; ?>

    <div class="about_mobile">
      <div class="mobile_image" style="background-image:url(<?php echo $picturesArray[0]; ?>)"></div>
      <div class="mobile_text">
        <?php if ( qtranxf_getLanguage() === "en" ) { ?>
          <h1><?php echo $pods->display('about_willey_title'); ?></h1>
          <p><?php echo $pods->display('about_willey_text'); ?></p>
        <?php } else { ?>
          <h1><?php echo $pods->display('about_willey_title_zh'); ?></h1>
          <p><?php echo $pods->display('about_willey_text_zh'); ?></p>
        <?php } ?>
      </div>

      <div class="mobile_image" style="background-image:url(<?php echo $picturesArray[1]; ?>)"></div>
      <div class="mobile_text">
        <?php if ( qtranxf_getLanguage() === "en" ) { ?>
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
        <?php } else { ?>
          <h1><?php echo $pods->display('mission_statement_title_zh'); ?></h1>
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <h2><?php echo $pods->display('mission_column1_title_zh'); ?></h2>
              <p><?php echo $pods->display('mission_column1_zh'); ?></p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <h2><?php echo $pods->display('mission_column2_title_zh'); ?></h2>
              <p><?php echo $pods->display('mission_column2_zh'); ?></p>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <h2><?php echo $pods->display('mission_column3_title_zh'); ?></h2>
              <p><?php echo $pods->display('mission_column3_zh'); ?></p>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="mobile_image" style="background-image:url(<?php echo $picturesArray[2]; ?>)"></div>
      <div class="mobile_text">
        <?php if (qtranxf_getLanguage() === 'en') { ?>
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
        <?php } else { ?>
          <h1><?php echo $pods->display('sustainability_title_zh'); ?></h1>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <span><h2><?php echo $pods->display('sustainability_column1_title_zh'); ?></h2>
              <p><?php echo $pods->display('sustainability_column1_zh'); ?></p></span>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <span><h2><?php echo $pods->display('sustainability_column2_title_zh'); ?></h2>
              <p><?php echo $pods->display('sustainability_column2_zh'); ?></p></span>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="about_desktop">
      <div class="company_toggle_buttons">
        <img id="about_button" class="ON" src="/wp-content/themes/willeytheme/assets/images/icons/about.png" />
        <img id="mission_button" src="/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png" />
        <img id="sustain_button" src="/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png" />
      </div>

      <div id="about_anchor_div">
        <div class="about_popup">
          <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
            <h1><?php echo $pods->display('about_willey_title'); ?></h1>
            <span><p><?php echo $pods->display('about_willey_text'); ?></p><span>
          <?php } else { ?>
            <h1><?php echo $pods->display('about_willey_title_zh'); ?></h1>
            <span><p><?php echo $pods->display('about_willey_text_zh'); ?></p><span>
          <?php } ?>
        </div><!--about_popup-->
      </div>
      <div id="mission_anchor_div">
        <div class="mission_popup">
          <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
            <h1><?php echo $pods->display('mission_statement_title'); ?></h1>
          <?php } else { ?>
            <h1><?php echo $pods->display('mission_statement_title_zh'); ?></h1>
          <?php } ?>
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
                <span><h2><?php echo $pods->display('mission_column1_title'); ?></h2>
                <p><?php echo $pods->display('mission_column1'); ?></p></span>
              <?php } else { ?>
                <span><h2><?php echo $pods->display('mission_column1_title_zh'); ?></h2>
                <p><?php echo $pods->display('mission_column1_zh'); ?></p></span>
              <?php } ?>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
                <span><h2><?php echo $pods->display('mission_column2_title'); ?></h2>
                <p><?php echo $pods->display('mission_column2'); ?></p></span>
              <?php } else { ?>
                <span><h2><?php echo $pods->display('mission_column2_title_zh'); ?></h2>
                <p><?php echo $pods->display('mission_column2_zh'); ?></p></span>
              <?php } ?>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
                <span><h2><?php echo $pods->display('mission_column3_title'); ?></h2>
                <p><?php echo $pods->display('mission_column3'); ?></p></span>
              <?php } else { ?>
                <span><h2><?php echo $pods->display('mission_column3_title_zh'); ?></h2>
                <p><?php echo $pods->display('mission_column3_zh'); ?></p></span>
              <?php } ?>
            </div>
          </div>
        </div><!--mission_popup-->
      </div>
      <div id="sustain_anchor_div">
        <div class="sustainability_popup">
          <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
            <h1><?php echo $pods->display('sustainability_title'); ?></h1>
          <?php } else { ?>
            <h1><?php echo $pods->display('sustainability_title_zh'); ?></h1>
          <?php } ?>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
                <span><h2><?php echo $pods->display('sustainability_column1_title'); ?></h2>
                <p><?php echo $pods->display('sustainability_column1'); ?></p></span>
              <?php } else { ?>
                <span><h2><?php echo $pods->display('sustainability_column1_title_zh'); ?></h2>
                <p><?php echo $pods->display('sustainability_column1_zh'); ?></p></span>
              <?php } ?>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <?php if ( qtranxf_getLanguage() === 'en' ) { ?>
                <span><h2><?php echo $pods->display('sustainability_column2_title'); ?></h2>
                <p><?php echo $pods->display('sustainability_column2'); ?></p></span>
              <?php } else { ?>
                <span><h2><?php echo $pods->display('sustainability_column2_title_zh'); ?></h2>
                <p><?php echo $pods->display('sustainability_column2_zh'); ?></p></span>
              <?php } ?>
            </div>
          </div>
        </div><!--sustainability_popup-->
      </div>

      <div id="background_images">
        <?php foreach ( $picturesArray as $picture ) { ?>
          <div class="bg_image" id="<?php echo "bg_image".$counter; ?>" style="background-image:url(<?php echo esc_html($picture); ?>)"></div>
          <?php $counter++;
        } ?>
      </div>

    </div><!--about_desktop-->
    <?php endwhile; // endwhile
    endif; // endif ?>
    </div><!--entry-content2-->
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

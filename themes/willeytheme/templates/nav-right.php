<div id="right-nav">
  <?php if ( is_page('journal') ) { ?>

  <div class="timeline-wrapper">
    <img class="icon-nav-right" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
    <h1 class="nav-title">
       <?php if ( qtranxf_getLanguage() == "en" ){
          echo "DATE"; }
            elseif ( qtranxf_getLanguage() == "zh" ){
          echo "日期"; } ?>
    </h1>

    <?php foreach(posts_by_year() as $year => $posts) : ?>
      <h5 class="timeline-year"><span><?php echo $year; ?></span><h5>

      <ul id="timeline-list">
        <?php foreach($posts as $post) : setup_postdata($post); ?>
          <li>
            <a href="#<?php echo get_the_ID() ?>" class="list1">
              <p class="timeline-date"><?php echo get_the_date('d M'); ?></p>
              <p class="timeline-event"><?php the_title(); ?></p>
            </a>
            <br />
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endforeach; ?>
  </div> <!-- end timeline-wrapper-->

  <?php } else { ?>
    <img class="sorting_icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/folder.png" />
    <h1 class="nav_title">
      <?php if ( qtranxf_getLanguage() == "en" ){
        echo "SORTING"; }
          elseif ( qtranxf_getLanguage() == "zh" ){
        echo "分類"; } ?>
    </h1>
    <div class="nav_right_menu_container">
      <!-- <h5 class="custom_menu_title">
        <span>
          <?php if ( qtranxf_getLanguage() == "en" ){
            echo "BRAND"; }
              elseif ( qtranxf_getLanguage() == "zh" ){
            echo "XBrands"; } ?>
        </span>
      </h5>
      <ul class="brands">
        <?php
          $workbrand_terms = get_terms( 'workbrand' );
          foreach ( $workbrand_terms as $work_term ) {
            ?>  <li>
                <a href="<?php echo get_home_url() . "/?brand=" . $work_term->slug; ?>">
                  <p class="list1">
                    <?php echo $work_term->name; ?>
                  </p>
                </a>
              </li>
            <?php } ?>
      </ul> -->

      <h5 class="custom_menu_title">
        <span>
          <?php if ( qtranxf_getLanguage() == "en" ){
          echo "CATEGORY"; }
            elseif ( qtranxf_getLanguage() == "zh" ){
          echo "種類"; } ?>
        </span>
      </h5>

       <?php /* Primary navigation */
          wp_nav_menu( array(
            'menu' => 'work list',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'nav-sorting',
            'link_before' => '<p class="list1">',
            'link_after' => '</p>',
            //Process nav menu using our custom nav walker
            'walker' => new wp_bootstrap_navwalker())
          ); ?>
      <ul class="nav-sorting hide">
        <?php
        $category_terms = get_terms( 'workcategory' );
        foreach ( $category_terms as $category_term ) {
          ?>  <li>
              <a href="<?php echo get_home_url() . "/?sorting=" . $category_term->slug; ?>">
                <p class="list1">
                   <?php echo $category_term->name; ?>
                 </p>
               </a>
             </li>
         <?php } ?>
      </ul>
    </div>
    <a href="#">
      <img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="desktop_right_nav" />
    </a>
  <?php } ?>
</div>
<!-- <div class="right-exit-menu">
  <a href="#">
    <img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button" />
  </a>
</div> -->

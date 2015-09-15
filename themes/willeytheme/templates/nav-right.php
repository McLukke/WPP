<div id="right-nav">
  <?php if ( is_page('journey') ) { ?>

  <div class="timeline-wrapper">
    <c><img id="publsih-icon"class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" /></c>
   
    <h1 class="nav-title">DATE</h1>

    <?php foreach(posts_by_year() as $year => $posts) : ?>
      <h5 class="timeline-year"><span><?php echo $year; ?></span><h5>

      <ul>
        <?php foreach($posts as $post) : setup_postdata($post); ?>
          <li>
            <a href="#<?php echo get_the_ID() ?>" class="journey_date">
              <h5 class="timeline-date"><?php echo get_the_date(); ?></h5>
              <h5 class="timeline-event"><?php the_title(); ?></h5>
            </a>
            <br />
          </li> 
        <?php endforeach; ?>
      </ul>
    <?php endforeach; ?>
  </div> <!-- end timeline-wrapper-->

  <?php } else { ?>
    <img class="sorting_icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/folder.png" />
    <h1 class="nav_title">SORTING</h1>

    <div class="nav_right_menu_container">
      <ul class="brands">
        <h5 class="custom_menu_title"><span>BRAND</span></h5>
        <li>
          <a href="<?php echo get_home_url() . "/?brand=art-basel"; ?>"><p class="list1">ART BASEL</p></a>
        </li>
        <li>
          <a href="<?php echo get_home_url() . "/?brand=art-school-musical"; ?>"><p class="list1">ART SCHOOL MUSICAL</p></a>
        </li>
        <li>
          <a href="<?php echo get_home_url() . "/?brand=wai-yin-association"; ?>"><p class="list1">WAI YIN ASSOCIATION</p></a>
        </li>
        <li>
          <a href="<?php echo get_home_url() . "/?brand=simon-birch"; ?>"><p class="list1">SIMON BIRCH</p></a>
        </li>
        <li>
          <a href="<?php echo get_home_url() . "/?brand=other"; ?>"><p class="list1">OTHER</p></a>
        </li>
      </ul>

      <ul class="nav-sorting">
        <h5 class="custom_menu_title"><span>CATEGORY</span></h5>
        <li>
          <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>"><p class="list1">SEASONAL</p></a>
        </li>

        <li>
          <a href="<?php echo get_home_url() . "/?sorting=premium"; ?>"><p class="list1">PREMIUM</p></a>
        </li>

        <li>
          <a href="<?php echo get_home_url() . "/?sorting=stationary"; ?>"><p class="list1">STATIONARY</p></a>
        </li>

        <li>
          <a href="<?php echo get_home_url() . "/?sorting=promotional"; ?>"><p class="list1">PROMOTIONAL</p></a>
        </li>

        <li>
          <a href="<?php echo get_home_url() . "/?sorting=packaging"; ?>"><p class="list1">PACKAGING</p></a>
        </li>

        <li>
          <a href="<?php echo get_home_url() . "/?sorting=brochure"; ?>"><p class="list1">BROCHURE</p></a>
        </li>
      </ul>
    </div>
    <a href="#">
      <img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="desktop_right_nav" />
    </a>
  <?php } ?>
</div>
<div class="right-exit-menu">
  <a href="#">
    <img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button" />
  </a>
</div>

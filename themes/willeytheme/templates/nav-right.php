<div id="right-nav">
  <?php if ( is_page('journey') ) { ?>

  <div class="timeline-wrapper">
    <img class="icon-nav-right" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
    <h1 class="nav-title">DATE</h1>

    <?php foreach(posts_by_year() as $year => $posts) : ?>
      <h5 class="timeline-year"><span><?php echo $year; ?></span><h5>

      <ul>
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
    <h1 class="nav-title">SORTING</h1>
    <ul class="brands">
      <h5 class="timeline-year"><span>BRAND</span><h5>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1"><p>ART BASEL</p></a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1"><p>ART SCHOOL MUSICAL</p></a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1"><p>WAI YIN ASSOCIATION</p></a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1"><p>SIMON BIRCH</p></a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=other"; ?>" class="list1"><p>OTHER</p></a>
      </li>
    </ul>

    <ul class="nav-sorting">
      <h5 class="custom_menu_title"><span>CATEGORY</span><h5>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1"><p>SEASONAL</p></a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=premium"; ?>" class="list1"><p>PREMIUM</p></a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=stationary"; ?>" class="list1"><p>STATIONARY</p></a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=promotional"; ?>" class="list1"><p>PROMOTIONAL</p></a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=packaging"; ?>" class="list1"><p>PACKAGING</p></a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=brochure"; ?>" class="list1"><p>BROCHURE</p></a>
      </li>
    </ul>
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

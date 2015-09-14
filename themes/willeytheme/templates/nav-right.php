<div id="right-nav">
  <?php if ( is_page('journey') ) { ?>

  <div class="timeline-wrapper">
    <img class="work-details-info-icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/publish.png" />
    <h1 class="nav-title">DATE</h1>

    <?php foreach(posts_by_year() as $year => $posts) : ?>
      <h5 class="timeline-year"><span><?php echo $year; ?></span><h5>

      <ul>
        <?php foreach($posts as $post) : setup_postdata($post); ?>
          <li>
            <a href="#<?php echo $post->post_name;?>">
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
    <h1 class="nav-title">SORTING</h1>
    <ul class="brands">
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1">ART BASEL</a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1">ART SCHOOL MUSICAL</a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1">WAI YIN ASSOCIATION</a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1">SIMON BIRCH</a>
      </li>
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=other"; ?>" class="list1">OTHER</a>
      </li>
    </ul>
    <ul class="nav-sorting">
      <li>
        <a href="<?php echo get_home_url() . "/?sorting=seasonal"; ?>" class="list1">SEASONAL</a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=premium"; ?>" class="list1">PREMIUM</a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=stationary"; ?>" class="list1">STATIONARY</a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=promotional"; ?>" class="list1">PROMOTIONAL</a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=packaging"; ?>" class="list1">PACKAGING</a>
      </li>

      <li>
        <a href="<?php echo get_home_url() . "/?sorting=brochure"; ?>" class="list1">BROCHURE</a>
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

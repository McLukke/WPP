<div id="right-nav">
  <?php if ( is_page('journey') ) { ?>
    <h1><span class="nav-title">DATE</span></h1>
    <ul class="timeline-year">
      <li><span class="timeline-year">2015</span></li>
      <li><span class="timeline-year">2014</span></li>
    </ul>
  <?php } else { ?>
    <br>
    <br>
    <h1 class="nav-title">SORTING</h1>
    <br><br><br><br><br>
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

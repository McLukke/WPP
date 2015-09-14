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
      <br>
      <br>
      <h1 class="nav-title">SORTING</h1>
      <br><br><br><br><br>
      <ul class="nav-sorting">
        <li><a href="#"><span class="list1">SEASONAL</span></a></li>
        <li><a href="#"><span class="list1">PREMIUM</span></a></li>
        <li><a href="#"><span class="list1">STATIONARY</span></a></li>
        <li><a href="#"><span class="list1">PROMOTIONAL</span></a></li>
        <li><a href="#"><span class="list1">PACKAGING</span></a></li>
        <li><a href="#"><span class="list1">BROCHURE</span></a></li>
      </ul>
      <a href="#">
        <img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="desktop_right_nav exit_button">
      </a>
    <?php } ?>
</div>
<div class="right-exit-menu">
  <a href="#">
    <img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button">
  </a>
</div>
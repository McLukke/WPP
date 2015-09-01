<div id="right-nav">
         
  <?php if(is_front_page()) : ?>
      <br>
      <br>
      <h1><span class="nav-title">SORTING</span></h1>
      <br><br><br><br><br>
      <ul class="nav-sorting">
        <li><a href="#"><span class="list1">SEASONAL</span></a></li>
        <li><a href="#"><span class="list1">PREMIUM</span></a></li>
        <li><a href="#"><span class="list1">STATIONARY</span></a></li>
        <li><a href="#"><span class="list1">PROMOTIONAL</span></a></li>
        <li><a href="#"><span class="list1">PACKAGING</span></a></li>
        <li><a href="#"><span class="list1">BROCHURE</span></a></li>
      </ul>


  <?php elseif(is_page("journey")) : ?>
    <br><br>
      <h1><span class="nav-title">DATE</span></h1>
      <br><br>
      <ul class="timeline-year">
        <li><span class="timeline-year">2015</span></li>
        <li><span class="timeline-year">2014</span></li>
      </ul>
  
      <!-- // can potentially use 'else'
      // list posts sorted by date from bulletin archives
      echo "Journey Timeline"; -->

  <?php endif; ?>

</div>



<!-- invisible div -->
  <div class="menu-close-right">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button"></a>
  </div>

  <div class="menu-open-right">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/folder.png" class="exit-button"></a>
  </div>







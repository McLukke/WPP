<div id="right-nav">
  <?php
    if ( is_front_page() ) {
      echo "Hello this is home";

    } else if ( is_page("journey") ) {
      // can potentially use 'else'
      // list posts sorted by date from bulletin archives
      echo "this is for the journey";

    } else {} 
  ?>

</div>

  <div class="menu-close-right">
        <a href="#"><img src="<?php echo bloginfo('template_directory')?>/assets/images/icons/close.png" class="exit-button"></a>
  </div>

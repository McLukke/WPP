<div id="right-nav">
  <?php
    if ( is_front_page() ) {
      echo "Hello this is home";

    } else if ( $post->ID === "journey" ) {
      // can potentially use 'else'
      // list posts sorted by date from bulletin archives
      echo "this is for the journey"

    } else {

    }
  ?>
</div>

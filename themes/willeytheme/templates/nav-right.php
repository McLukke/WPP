<div id="right-nav"><?php
    if ( is_home() ) {
  ?><ul class="sidebar-nav">
    <li class="sidebar-brand">
      <h1>Sorting</h1>
    </li><?php /* Primary navigation */
      wp_nav_menu( array(
        'menu' => 'top_menu',
        'depth' => 2,
        'container' => false,
        'menu_class' => 'nav',
        //Process nav menu using our custom nav walker
        'walker' => new wp_bootstrap_navwalker())
      );
    ?><span class="credits">&copy; Willey Printing Ltd. 2015</span>
  </ul><?php
  
  } else if ( $post->ID === "journey" ) {
    // can potentially use 'else'
    // list posts sorted by date from bulletin archives

  } else {
    // show nothing

  } ?>
</div>

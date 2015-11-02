<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {
          $locations = array(
            'right_work_sort' => __( 'For Sorting Work', 'text_domain' ),
            'primary'=> __( 'Primary navigation', 'wptuts' )
          );
          register_nav_menus( $locations );

        }
      endif;

// Register bootstrap files and jQuery:
// Register Packery file
function wpt_register_js() {
    // wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assets/scripts/js/bootstrap.js', 'jquery');
    // wp_enqueue_script('jquery.bootstrap.min');

    wp_register_script('packery.pkgd.js', get_template_directory_uri() . '/assets/scripts/js/packery.pkgd.js', 'jquery',false,true);
    wp_enqueue_script('packery.pkgd.js');

    // wp_register_script('packery.pkgd.min.js', get_template_directory_uri() . '/assets/scripts/js/packery.pkgd.min.js', 'jquery');
    // wp_enqueue_script('packery.pkgd.min.js');
}
add_action( 'init', 'wpt_register_js', 200 );


function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/assets/styles/css/bootstrap.css' );
    wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'willeytheme' ),
) );

// After you have set a static page as your home page you add this to your functions.php. This calls archive-POSTTYPE.php template.
add_action("pre_get_posts", "custom_front_page");
function custom_front_page($wp_query){
    //Ensure this filter isn't applied to the admin area
    if(is_admin()) {
        return;
    }

    if($wp_query->get('page_id') == get_option('page_on_front')):

        $wp_query->set('post_type', 'work');
        $wp_query->set('page_id', ''); //Empty

        //Set properties that describe the page to reflect that
        //we aren't really displaying a static page
        $wp_query->is_page = 0;
        $wp_query->is_singular = 0;
        $wp_query->is_post_type_archive = 1;
        $wp_query->is_archive = 1;

    endif;

}

// retrieve right-nav data once and display
function posts_by_year() {
  // array to use for results
  $years = array();

  // get posts from WP
  $posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish'
  ));

  // loop through posts, populating $years arrays
  foreach($posts as $post) {
    $years[date('Y', strtotime($post->post_date))][] = $post;
  }

  // reverse sort by year
  krsort($years);

  return $years;
}

add_action("archive-work", "display_post_details");
function display_post_details ($post_id, $class) {
  if (has_post_thumbnail( $post_id ) ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
    $image = $image[0];
  }else{
    $image = get_bloginfo('template_directory')."/wp-content/themes/willeytheme/assets/images/icons/black.png";
  } ?>

  <div class="item <?php echo $class; ?>" style="background-image: url('<?php echo $image; ?>')">
    <div class="hover_text" onclick="location.href='<?php the_permalink(); ?>'">
      <?php the_title('<h3>','</h3>'); ?>
      <div class="work-details-info">

        <div class="work-details-block">
          <img class="work-details-info-icon" src="<?php echo get_bloginfo('template_directory')?>/assets/images/icons/paper_bnw.png" />
          <p class="title--work">PAPER</p>
          <div class="link-not-active">
            <p>
              <?php the_terms( $post_id, 'paper');  ?>
            </p>
          </div>
        </div>

        <div class="work-details-block">
          <img class="work-details-info-icon" src="<?php echo get_bloginfo('template_directory')?>/assets/images/icons/printing_effect_bnw.png" />
          <p class="title--work">PRINTING EFFECT</p>
          <div class="link-not-active">
            <p>
              <?php the_terms( $post_id, 'printingeffect');  ?>
            </p>
          </div>
        </div>

         <div class="work-details-block">
          <img class="work-details-info-icon" src="<?php echo get_bloginfo('template_directory')?>/assets/images/icons/publish_bnw.png" />
          <p class="title--work">PUBLISH TIME</p>
          <div class="link-not-active">
            <p>
              <?php echo esc_html(get_the_date('d / m / Y')); ?>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php
} ?>
<?php
/**
 * Template Name: Contact Us Template
 */
?>
<div id="contact_page">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <div class="desktop_contact_form">
            <h1><?php the_title(); ?></h1>
            <?php echo $post->post_content; ?>

            <?php echo do_shortcode ( '[contact-form-7 id="22" title="Enquiry Form"]' ); ?>
        </div>
    </div>

    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5"><?php
        echo do_shortcode ( '[MultipleMarkerMap id="contact_us_map" z="12" lat="48.220162" lon="16.287525" marker="48.193054,16.261282,Bar,http://google-maps-icons.googlecode.com/files/cocktail.png|48.220162,16.287525,point-of-view,http://google-maps-icons.googlecode.com/files/beautiful.png" w="100%"]' ); ?>
    <br />
    <div class="contact_details">
        <p>Contact:</p>
        <p class="bg-icon-publish work-detail-icon">2/F, Silver Tech Tower, 26 Cheung Lee Street, Chai Wan. Hong Kong</p>
        <p class="bg-icon-publish work-detail-icon">(852) 2552 7113</p>
        <p class="bg-icon-publish work-detail-icon">(852) 2555 1179</p>
        <p class="bg-icon-publish work-detail-icon">info@willey.com.hk</p>
        <p>Follow us on:<br />
        <a href=""><img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook.png"></img></a>
        <a href=""><img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/linkedin.png"></img></a></p>
        <p>Upload file by FTP<br />
        <a href=""><img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/upload.png"></img></a></p>
    </div>
    <br />
    <div class="mobile_contact_form">
        <h1>Get in Touch<br />with Us</h1>
        <p>Request a quote or to discuss your next design project. We work with clients all over the world.</p>
        
        <?php echo do_shortcode ( '[contact-form-7 id="22" title="Enquiry Form"]' ); ?>
    </div>
</div>

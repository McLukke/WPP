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
        echo do_shortcode ( '[MultipleMarkerMap id="contact_us_map" z="15" lat="22.265704" lon="114.235443" marker="22.265704,114.235443" w="100%"]' ); ?>
    <br />
    <div class="contact_details">
        <p><?php echo do_shortcode ("[:en]English Text[:zh]Deutsch[:]"); ?></p>
        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/contact.png" alt="Contact Address" />
            <p>2/F, Silver Tech Tower, 26 Cheung Lee Street, Chai Wan. Hong Kong</p>
        </span>
        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/phone.png" alt="Phone Number" />
            <p>(852) 2552 7113</p>
        </span>
        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/printer.png" alt="Fax Number" />
            <p>(852) 2555 1179</p>
        </span>
        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/email.png" alt="Email Address" />
            <p>info@willey.com.hk</p>
        </span>
        <br />
            <p>Follow us on:<br />
            <a href=""><img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/facebook.png"></img></a>
            <a href=""><img class="icon" src="<?php echo bloginfo('template_directory')?>/assets/images/icons/linkedin.png"></img></a>
            </p>
    </div>
    <br />
    <div class="mobile_contact_form">
        <h1>Get in Touch<br />with Us</h1>
        <p>Request a quote or to discuss your next design project. We work with clients all over the world.</p>
        
        <?php echo do_shortcode ( '[contact-form-7 id="22" title="Enquiry Form"]' ); ?>
    </div>
</div>

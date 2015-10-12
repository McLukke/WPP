<div id="contact_page">
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="desktop_contact_form">
            <h1><?php the_title(); ?></h1>
<?php the_content() ?>

            <!-- <h1><?php qtranxf_getLanguage() ?></h1> -->
            <?php //echo do_shortcode ( '[contact-form-7 id="22" title="Enquiry Form"]' ); ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div id="contact_us_map">
        <?php
        echo do_shortcode ( '[MultipleMarkerMap id="contact_us_map" draggable="false" scrollwheel="false" scale="false" hidecontrols="true" z="15" lat="22.265704" lon="114.235443" marker="22.265704,114.235443" w="100%"]' ); ?>
        </div>
    <br />
    <div class="contact_details">

        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/contact.png" alt="Contact Address" />
             <p>
            <?php
                $lang = qtranxf_getlanguage();

                if($lang == "zh"){
                    echo '柴灣祥利街26號銀星中心';
                }else{
                    echo '2/F, Silver Tech Tower, 26 Cheung Lee Street, Chai Wan. Hong Kong';
                }
            ?>
        </p>

        </span>
        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/phone.png" alt="Phone Number" />
            <p>(852) 2552 7113</p>
        </span>
        <span>
            <img class="contact_icons" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/printer.png" alt="Fax Number" />
            <p>(852) 2555 1179</p>
        </span>
        <span class="contact_email_span">
            <img class="contact_email_icon" src="<?php echo bloginfo('template_directory'); ?>/assets/images/icons/email.png" alt="Email Address" /><p><a class="contact_email" href="mailto:info@willey.com.hk">info@willey.com.hk</a></p>
        </span>


        <p><strong>
            <?php
                $lang = qtranxf_getlanguage();

                if($lang == "zh"){
                    echo '跟著我們';
                }else{
                    echo 'Follow us on:';
                }
            ?>
        <strong></p>
            <!-- <p>Follow us on:<br /></p> -->
            <p>
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
    <!--
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv2_hi1EyXXIUgKlG0_dAUOBrNCbCmToc&signed_in=true&callback=initMap"
        async defer></script>
    -->
</div>

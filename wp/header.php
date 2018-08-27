<?php $template = get_queried_template(); ?>
<!DOCTYPE html><!--[if lt IE 7 ]>
<html class="oldie"> <![endif]-->
<!--[if IE 7 ]>
<html class="oldie"> <![endif]-->
<!--[if IE 8 ]>
<html class="oldie"> <![endif]-->
<!--[if IE 9 ]>
<html class="oldie"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class=""> <!--<![endif]-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="theme-color" content="#1b7bef">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="apple-touch-icon" sizes="57x57"
          href="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/fav/apple-icon-144x144.png">
    <link rel="icon" type="image/png"
          href="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/fav/favicon.ico">

    <script type="text/javascript">
        var vars = {
            ajaxUrl: "",
            page: '<?php echo get_js_var($template); ?>'
        };
    </script>

    <?php wp_head(); ?>

   <?= get_field('google_analytics', 'option'); ?>

</head>
<body <?php body_class(); ?>>
<div class="old-ie"><a href="#" class="site-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/site-logo-green.png" alt="Beacon Lab Benefits Solutions"></a>
    <div class="bordered">
        <p>To access Physician Decision Support please click on the following: <a target="_blank"
                                                                                  href="http://www.beaconlbs.com/lbs-web">www.beaconlbs.com/lbs-web</a>

        </p>
    </div>
    <div class="bordered">
        <p>
            It appears that our website is not compatible with your browser.
            Please use one of the following browsers to have the best website experience:
            Chrome 52+, Firefox 47+, Edge 25+, Safari 9.1.2+, IE11

        </p>
    </div>
    <div class="wrap-links">
        <a target="_blank" href="https://www.google.com/chrome/browser/desktop/" class="link-browser"><img
                    src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/chrome.png" alt="Beacon Lab Benefits Solutions"></a>
        <a target="_blank" href="https://www.mozilla.org/en-US/firefox/new/" class="link-browser"><img
                    src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/firefox.png" alt="Beacon Lab Benefits Solutions"></a>
        <a target="_blank" href="https://support.microsoft.com/en-us/help/17621/internet-explorer-downloads"
           class="link-browser"><img src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/ie.png"
                                     alt="Beacon Lab Benefits Solutions"></a>
        <a target="_blank" href="https://www.microsoft.com/en-us/download/details.aspx?id=48126"
           class="link-browser"><img src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/edge.png"
                                     alt="Beacon Lab Benefits Solutions"></a>
        <a target="_blank" href="https://support.apple.com/downloads/safari" class="link-browser"><img
                    src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/safari.png" alt="Beacon Lab Benefits Solutions"></a>
    </div>
    <p>
        If IE11 does not work please check your "Compatibility Settings" and follow the instructions below:
        <br> <br>

    </p>
    <p>1. Open up Internet Explorer (IE 11)</p>
    <p>2. Press the Alt key on your keyboard, this will make a menu bar appear.</p>
    <p>3. Click on the Tools menu tab.</p>
    <p>4. Select the Compatibility View settings option.</p>
    <p>5. Uncheck the "Display intranet sites in Compatibility View" option</p>
    <p>6. Make sure to remove beaconlbs.com site from the Websites you've added to Compatibility View list</p>
</div>
<div style="background-image: url('<?php echo get_bg_image_field($template); ?>')" class="wrapper">
    <header class="site-header">
        <div class="row expanded">
            <div class="small-24 large-22 large-offset-1 columns">
                <div class="site-header__inner"><a href="<?php echo home_url(); ?>" class="site-logo"><img
                                src="<?php echo get_template_directory_uri(); ?>/slice2/dist/images/site-logo-green.png"
                                alt="Beacon Lab Benefits Solutions"></a>
                    <nav class="site-nav">
                        <?php
                        $defaults = array(
                            'menu' => 'Header Menu',
                            'container' => '',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'depth' => 1,
                            'items_wrap' => '<ul>%3$s</ul>'
                        );
                        wp_nav_menu($defaults); ?>
                        <?php $social_links = get_field('social_links', 'options'); ?>
                        <?php if (!adv_empty($social_links)) { ?>
                            <ul class="socials">
                                <?php foreach ($social_links as $link) { ?>
                                    <li><a href="<?php echo $link['reference']; ?>"
                                           class="icon-<?php echo $link['network']; ?>"></a></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </nav>
                    <?php
                    $lab_testing_button_settings = get_field('lab_testing_button_settings', 'option');
                    $physician_login_button_settings = get_field('physician_login_button_settings', 'option');
                    $lab_login_button_settings = get_field('lab_login_button_settings', 'option');
                    if ($lab_testing_button_settings['url'] || $physician_login_button_settings['url'] || $lab_login_button_settings['url']): ?>
                        <div class="site-login"><a href="#" data-open="loginModal" class="button radius icon-login"><span>Login</span></a></div>
                    <?php endif; ?>
                    <div class="menu-button">
                        <div class="sandwich">
                            <div class="sw-topper"></div>
                            <div class="sw-bottom"></div>
                            <div class="sw-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="site-main">
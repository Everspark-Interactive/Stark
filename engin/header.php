<?php
// =============================================================================
// HEADER.PHP
// -----------------------------------------------------------------------------
// Header of the theme.
// =============================================================================
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="wordpress">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php
    if (defined("HC_PLUGIN_PATH")) {
        global $HC_THEME_SETTINGS;
        global $HC_PAGE_ARR;
        include_once(HC_PLUGIN_PATH . "/inc/front-functions.php");
        include_once(HC_PLUGIN_PATH ."/global-content.php");

        if (!function_exists('has_site_icon') || !has_site_icon()) {   ?>
        <link rel="shortcut icon" href="<?php echo esc_url(hc_get_setting("favicon")) ?>" />
        <?php }
        wp_head();
        ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-78071754-1 "></script> -->
<script type="text/javascript">
  jQuery(document).ready(function(){
    setTimeout(function () {
    
      var script = document.createElement('script');
      script.defer = true;
      script.src = "https://www.googletagmanager.com/gtag/js?id=UA-78071754-1";
      document.getElementsByTagName('body')[0].appendChild(script);
      
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());

       gtag('config', 'UA-78071754-1');
      
      // Delay by 5000ms
    }, 5000);
  });
</script>
    </head>
    <body <?php body_class(); if (in_array("inner_menu",hc_get_now($HC_PAGE_ARR, array("page_setting","settings"))) || hc_get_setting('menu-one-page') == "checked") echo ' data-spy="scroll" data-target="#hc-inner-menu" data-offset="200"';?> <?php hc_echo(hc_get_setting('site-background-color'),'style="background-color: ',';"') ?>>
		
        <?php
        hc_header_engine();
    } else {
        //The code block below is only a default code block. It is applied only at first time theme activation and disabled when the theme's plugin is activated.
        //The logo can be changed from the theme options panel once the plugin has been activated.
        wp_head();
        ?>
        </head>
        <body <?php body_class() ?>>
			
            <header>
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar navbar-main">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="<?php echo esc_url(get_site_url()) ?>"><img src="<?php echo esc_url(get_template_directory_uri() . "/inc/logo.png") ?>" alt="<?php echo get_bloginfo("name") ?>" /></a>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav over">
                                    <?php engin_set_default_menu() ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
<?php }
?>

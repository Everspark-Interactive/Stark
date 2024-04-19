<?php
// =============================================================================
// TEMPLATE NAME: Base
// -----------------------------------------------------------------------------
// Base template.
// =============================================================================
get_header();

if (defined("HC_PLUGIN_PATH")) {
    if (is_home()) {
      hc_archive_engine();
    }else{
      include_once(HC_PLUGIN_PATH . "/global-content.php");
      engin_the_content();
    }
} else {
  if (is_home()) {
    //render default blog/archeve page
    engine_default_blog_container( esc_attr__("Blog","engin") );

  } else {
     engin_the_content();
  }
}

get_footer();
?>

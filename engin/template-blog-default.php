<?php
// =============================================================================
// TEMPLATE NAME: Default Blog
// -----------------------------------------------------------------------------
// Background video template.
// Documentation: framework-y.com/templates/base/template-background-video.html
// =============================================================================

get_header();
    function show_the_content() {
        while (have_posts()) {
            the_post();
            if (defined("HC_PLUGIN_PATH"))  {
                if (hc_get_setting("featured-image"))  {
                    the_post_thumbnail("large");
                }
            } else {
                the_post_thumbnail("large");
            }
            the_content();
            wp_link_pages(array('before' => '<div class="pagination post-pagination">','after' => '</div>','link_before' => '<span>','link_after' => '</span>','pagelink' => '%'));
        }
    }
    $default_content = false;
    if (!defined("HC_PLUGIN_PATH")) {
        $default_content = true;
    } else {
        global $HC_CLASSIC_CONTENT;
        if ($HC_CLASSIC_CONTENT == true) $default_content =true;
    }
    if ($default_content) {
?>
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>
                      <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } else {
        hc_get_title();
    }
    $post_type_id = 0;
    $post_type = get_post_type();
    if ($post_type != "post" && $post_type != "page") {
        $current_post_type = get_post_type_object(get_post_type());
        $lists_ids = array();
        $args = array( 'post_type' => 'y-post-types', 'posts_per_page' => 999 );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                if (strcasecmp($current_post_type->label,$the_query->post->post_name) == 0) {
                    $post_type_id = $the_query->post->ID;
                }
            }
        }
        wp_reset_postdata();
    } else {
        $post_type_id = get_the_ID();
    }
    $sidebar = get_post_meta($post_type_id, 'engin-sidebar');
    $sw = array("left"=>"col-md-3","right"=>"col-md-3","content"=>"col-md-9");

    if (count($sidebar) > 0) {
        $sidebar = $sidebar[0];
        $woocommerce_prefix = "";
        if (defined("HC_PLUGIN_PATH") && hc_get_setting("shop-page") == $post_type_id) $woocommerce_prefix = "woocommerce_shop_";
        if (defined("HC_PLUGIN_PATH")) $sw = hc_get_sidebars_width($sidebar);
    }
    else $sidebar = "";
    if ($default_content || $sidebar != "") {
        if ($sidebar != "") echo "<div class='sidebar-cnt'>"; ?>
<div class="container content <?php if ($sidebar != "") echo "sidebar-content"; ?>">
    <?php }
    if ($sidebar == "left") {
    ?>
    <div class="row">
        <div class="<?php echo esc_attr($sw["left"]) ?> widget">
            <?php if (is_active_sidebar("left_side_bar")) dynamic_sidebar($woocommerce_prefix . "left_side_bar"); ?>
        </div>
        <div class="<?php echo esc_attr($sw["content"]) ?>">
            <?php show_the_content() ?>
			<?php get_template_part('default-archive'); ?>
        </div>
    </div>
    <?php
    }
    if ($sidebar == "right") {
    ?>
    <div class="row">
        <div class="<?php echo esc_attr($sw["content"]) ?>">
            <?php show_the_content() ?>
			<?php get_template_part('default-archive'); ?>
        </div>
        <div class="<?php echo esc_attr($sw["right"]) ?> widget">
            <?php if (is_active_sidebar("right_side_bar")) dynamic_sidebar($woocommerce_prefix . "right_side_bar"); ?>
        </div>
    </div>
    <?php
    }
    if ($sidebar == "right-left") {
    ?>
    <div class="row">
        <div class="<?php echo esc_attr($sw["left"]) ?> widget">
            <?php if (is_active_sidebar("left_side_bar")) dynamic_sidebar($woocommerce_prefix . "left_side_bar"); ?>
        </div>
        <div class="<?php echo esc_attr($sw["content"]) ?>">
            <?php show_the_content() ?>
			<?php get_template_part('default-archive');?>
        </div>
        <div class="<?php echo esc_attr($sw["right"]) ?> widget">
            <?php if (is_active_sidebar("right_side_bar")) dynamic_sidebar($woocommerce_prefix . "right_side_bar"); ?>
        </div>
    </div>
    <?php
    }
    if ($sidebar == "") {
        show_the_content();
		?>
	<div id="section_5ZtkF" class="section-item section-empty    " style="">
    <div class="content container " style="">
    <div class="row ">
        <div id="column_SRsnK" class="hc_column_cnt col-md-12   " style="">
    <div class="row">
	<?php	get_template_part('default-archive');
    } ?>
			</div></div></div></div></div>
	<?php
    if ($default_content || $sidebar != "") echo "</div></div>";


get_footer();
?>

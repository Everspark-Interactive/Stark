<?php
// =============================================================================
// TEMPLATE NAME: 404
// -----------------------------------------------------------------------------
// 404 Page Not Found template. This template is hidden.
// =============================================================================
get_header();
?>
<div class="section-empty box-middle-container full-screen-size">
    <div class="container content">
        <div class="row box-middle">
            <div class="col-md-12 text-center">
                <div>
                    <img src="<?php echo esc_url(ENGIN_URL . '/inc/404.png') ?>" alt="<?php esc_html_e("404 Error", "engin") ?>">
                    <hr class="space l" />
                    <h5>
                        <?php esc_html_e("Error 404", "engin") ?>
                    </h5>
                    <h1>
                        <?php esc_html_e("Whoops! :(", "engin") ?>
                    </h1>
                    <p>
                        <?php esc_html_e("We can't seem to find the page you were looking for.", "engin") ?>
                    </p>
                    <hr class="space m" />
                    <a class="btn circle-button" href="<?php echo esc_url(get_site_url()) ?>">
                        <?php esc_html_e("Go back to home", "engin") ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

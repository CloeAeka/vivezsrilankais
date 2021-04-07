<?php get_header(); ?>

    <div class="page-container">
        <div class="container">

            <section class="no-results error-404">

                <h1><?php esc_html_e( 'Oh Snap...', 'wundermag' ); ?></h1>
                <p><?php esc_html_e( 'The page you are looking for cannot be found.. Perhaps searching can help.', 'wundermag' ); ?></p>

                <?php get_search_form(); ?>


            </section><!-- .error-404 -->

        </div>
    </div>

<?php get_footer(); ?>

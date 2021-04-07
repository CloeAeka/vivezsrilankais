<section class="no-results not-found">

    <h1><?php esc_html_e( 'Nothing Found', 'wundermag' ); ?></h1>

    <div class="page-content">

        <?php if ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wundermag' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wundermag' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>

    </div><!-- .page-content -->

</section><!-- .no-results -->

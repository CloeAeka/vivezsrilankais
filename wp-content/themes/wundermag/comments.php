<div id="comments" class="comments-area">

    <?php if ( comments_open() ) :

        echo '<h4 class="section-title underline">';
        comments_number(__( 'No Comments', 'wundermag' ), esc_html__( '1 Comment', 'wundermag' ), '% ' . esc_html__( 'Comments', 'wundermag' ) );
        echo '</h4>';

    endif; ?>


    <?php if ( have_comments() ) : ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'        => 'ol',
                    'short_ping'   => true,
                    'avatar_size'  => 60,
                    'max_depth'	   => 5,
                    'callback'	   => 'wundermag_post_comments',
                    'type'		   => 'all'

                ) );
            ?>
        </ol><!-- .comment-list -->

        <div class='comments_pagination'>
            <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
        </div>

    <?php endif; ?>

    <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $wundermag_fields =  array(
          'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="' . esc_html__( 'Your Name', 'wundermag' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
          'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="' . esc_html__( 'Your Email', 'wundermag' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
          'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" placeholder="' . esc_html__( 'Your Website', 'wundermag' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
        );

        comment_form(array(
            'title_reply'		    => esc_html__('Leave a Comment', 'wundermag'),
            'title_reply_before'    => '<h4 id="reply-title" class="comment-reply-title section-title underline">',
            'title_reply_after'    => '</h4>',
            'logged_in_as' 			=> '',
            'comment_notes_after'	=> '',
            'comment_notes_before' 	=> '',
            'comment_field'		    => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="40" rows="8" aria-required="true" placeholder="' . esc_html__( 'Your Comment', 'wundermag' ) . ( $req ? '*' : '' ) . '"></textarea></p>',
            'cancel_reply_link'	    => '<i class="ion-android-close"></i>',
            'label_submit'		    => esc_html__('Post Comment', 'wundermag'),
            'class_submit'          => 'btn',
            'fields' => apply_filters( 'comment_form_default_fields', $wundermag_fields ),
        ));
    ?>

</div><!-- #comments -->

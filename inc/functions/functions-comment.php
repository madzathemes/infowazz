<?php
if ( ! function_exists( 'infowazz_posted_on' ) ) :

function infowazz_posted_on() {
	if ( false == get_theme_mod( 't_p_view_all_posts_by', false ) ) { $t_p_view_all_posts_by = esc_html__("View all posts by %s", "infowazz");  } else { $t_p_view_all_posts_by = get_theme_mod( 't_p_view_all_posts_by' ); $t_p_view_all_posts_by = $t_p_view_all_posts_by.' %s'; }
	$infowazz_allowed_html_array = array('a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
	printf( wp_kses(__( '<span class="date_links">%2$s</span>', 'infowazz' ), $infowazz_allowed_html_array ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr($t_p_view_all_posts_by), get_the_author() ),
			get_the_author()
		)
	);
}

endif;

//POST IN
if ( ! function_exists( 'infowazz_posted_in' ) ) :

function infowazz_posted_in() {
	$infowazz_allowed_html_array = array('a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = wp_kses(__( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'infowazz'  ), $infowazz_allowed_html_array );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = esc_html__( '%1$s.', 'infowazz' );
	} else {
		$posted_in = wp_kses(__( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'infowazz'  ), $infowazz_allowed_html_array );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

endif;

/*-----------------------------------------------------------------------------------*/
/*	Coment Function
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'infowazz_comment' ) ) :

function infowazz_comment( $comment, $args, $depth ) {
	if ( false == get_theme_mod( 't_c_edit', false ) ) { $t_c_edit = esc_html__("Edit", "infowazz");  } else { $t_c_edit = get_theme_mod( 't_c_edit' ); }
	if ( false == get_theme_mod( 't_c_reply', false ) ) { $t_c_reply = esc_html__("Reply", "infowazz");  } else { $t_c_reply = get_theme_mod( 't_c_reply' ); }
	if ( false == get_theme_mod( 't_c_comment_awaiting_moteration', false ) ) { $t_c_comment_awaiting_moteration = esc_html__("Submit Comment", "infowazz");  } else { $t_c_comment_awaiting_moteration = get_theme_mod( 't_c_comment_awaiting_moteration' ); }
	if ( false == get_theme_mod( 't_c_submit_comment', false ) ) { $t_c_submit_comment = esc_html__("Your comment is awaiting moderation.", "infowazz");  } else { $t_c_submit_comment = get_theme_mod( 't_c_submit_comment' ); }
	if ( false == get_theme_mod( 't_c_pingback', false ) ) { $t_c_pingback = esc_html__("Pingback:", "infowazz");  } else { $t_c_pingback = get_theme_mod( 't_c_pingback' ); }
	if ( false == get_theme_mod( 't_c_at', false ) ) { $t_c_at = esc_html__('%1$s at %2$s', 'infowazz');  } else { $t_c_at = get_theme_mod( 't_c_at' ); $t_c_at = '%1$s '.$t_c_at.' %2$s'; }
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php echo esc_html($t_c_pingback); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html($t_c_edit), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 80;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 80;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( esc_html__( '%1$s %2$s', 'infowazz' ),
							sprintf( '<h5 class="fn">%s</h5>', get_comment_author_link() ),
							sprintf( '<a href="%1$s" class="mt_comment_date"> <time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'Y-m-d' ),
								/* translators: 1: date, 2: time */
								sprintf( $t_c_at, get_comment_date('Y-m-d' ), get_comment_time() )
							)
						);
					?>


				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php echo esc_html($t_c_comment_awaiting_moteration); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="clear"></div>
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html($t_c_reply), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			<?php edit_comment_link( esc_html($t_c_edit), '<span class="edit-link">', '</span>' ); ?>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for _comment()
?>

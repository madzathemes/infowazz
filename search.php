<?php
/**
 * @author madars.bitenieks
 * @copyright 2017
 */
?>
<?php get_header();
if ( false == get_theme_mod( 't_p_permalink_to', false ) ) { $t_p_permalink_to = esc_html__("Permalink to %s", "infowazz");  } else { $t_p_permalink_to = get_theme_mod( 't_p_permalink_to' ).' %s'; }
if ( false == get_theme_mod( 't_p_sorry_search', false ) ) { $t_p_sorry_search = esc_html__("Sorry, but nothing matched your search criteria. Please try again with some different keywords.", "infowazz");  } else { $t_p_sorry_search = get_theme_mod( 't_p_sorry_search' ).' %s'; }
if ( false == get_theme_mod( 't_p_nothing_found', false ) ) { $t_p_nothing_found = esc_html__("Nothing Found", "infowazz");  } else { $t_p_nothing_found = get_theme_mod( 't_p_nothing_found' ); }
?>
<div class="mt-container-wrap">
	<?php infowazz_title(); ?>
<div class="container mt-content-container">
<div class="row">

	<div class="col-md-8">
		<?php if ( have_posts() ) :

			if ( shortcode_exists( 'posts' ) ) {

				echo do_shortcode('[posts pagination=on type=normal-right ]');

			} else {

				global $query_string;

				$query_args = explode("&", $query_string);
				$search_query = array();

				if( strlen($query_string) > 0 ) {
					foreach($query_args as $key => $string) {
						$query_split = explode("=", $string);
						$search_query[$query_split[0]] = urldecode($query_split[1]);
					} // foreach
				} //if

				$the_query = new WP_Query($search_query);


					if ( $the_query->have_posts() ) : ?>

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html($t_p_permalink_to), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_title();  ?></a></h2>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php echo esc_html($t_p_sorry_search); ?></p>
					<?php endif;

			}

			else : ?>
						<div id="post-0" class="post no-results not-found">
							<h2 class="entry-title"><?php echo esc_html($t_p_nothing_found); ?></h2>
							<div class="entry-content">
								<p><?php echo esc_html($t_p_sorry_search); ?></p>

							</div>
						</div>
		<?php endif; ?>
	</div>

	<div class="col-md-4 sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
</div>
<?php get_footer(); ?>

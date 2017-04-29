<?php get_header();

$tag_title = single_tag_title("", false);

$tag_obj = get_query_var('tag_id');
$tag_array = get_tag($tag_obj);
$tag_slug = $tag_array->slug;
if ( false == get_theme_mod( 't_p_tag', false ) ) { $t_p_tag = esc_html__("Tag", "infowazz");  } else { $t_p_tag = get_theme_mod( 't_p_tag' ); }
if ( false == get_theme_mod( 't_p_nothing_found', false ) ) { $t_p_nothing_found = esc_html__("Nothing Found", "infowazz");  } else { $t_p_nothing_found = get_theme_mod( 't_p_nothing_found' ); }
if ( false == get_theme_mod( 't_p_apologies', false ) ) { $t_p_apologies = esc_html__("Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.", "infowazz");  } else { $t_p_apologies = get_theme_mod( 't_p_apologies' ); }
?>
<div class="mt-container-wrap">
<div class="container mt-content-container">
	<div class="row">

		<div class="col-md-8 ">

				<?php if ( have_posts() ) : ?>

					<?php echo do_shortcode('[posts pagination=on title="'. esc_html($t_p_tag) .': '.esc_attr($tag_title).'" title_type="left" tag="'.esc_attr($tag_slug).'" type=normal-right]');?>

				<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php echo esc_html($t_p_nothing_found); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php echo esc_html($t_p_apologies); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php endif; ?>


		</div>


			<div class="col-md-4 sidebar"><?php get_sidebar(); ?></div>


	</div>
</div>
</div>
<?php get_footer(); ?>

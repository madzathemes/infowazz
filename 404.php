<?php get_header(); ?>
<?php if ( false == get_theme_mod( 't_p_nothing_found', false ) ) { $t_p_nothing_found = esc_html__("Nothing Found", "infowazz");  } else { $t_p_nothing_found = get_theme_mod( 't_p_nothing_found' ); }?>
<div class="mt-container-wrap">
	<div class="container mt-content-container">
			<div class="heading-404">
				<h2><?php esc_html_e( '404', 'infowazz' ); ?></h2>
				<h3><?php echo esc_html($t_p_nothing_found); ?></h3>
			</div>
	</div>
</div>
<?php get_footer(); ?>

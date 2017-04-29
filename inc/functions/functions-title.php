<?php function infowazz_title() {
if ( false == get_theme_mod( 't_p_search_result_for', false ) ) { $t_p_search_result_for = esc_html__("Search Results for: %s", "infowazz");  } else { $t_p_search_result_for = get_theme_mod( 't_p_search_result_for' ).' %s'; }
?>
  <div class="container page-title">
    <div class="row">
      <div class="col-md-12">
        <?php if(is_page()) { ?>
          <h1><?php the_title(); ?></h1>
        <?php } else ?>
        <?php if(is_search()) { ?>
					<h1><?php printf( esc_html($t_p_search_result_for), '' . get_search_query() . '' ); ?></h1>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php
}

add_filter('infowazz_title','infowazz_title'); ?>

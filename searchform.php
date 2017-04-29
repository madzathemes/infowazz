<?php if ( false == get_theme_mod( 't_p_to_search', false ) ) { $t_p_to_search = esc_html__("To search type and hit enter", "infowazz");  } else { $t_p_to_search = get_theme_mod( 't_p_to_search' ); } ?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>/">
	<input type="text" value="<?php echo esc_html($t_p_to_search); ?>" onfocus="if(this.value=='<?php echo esc_html($t_p_to_search); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo esc_html($t_p_to_search); ?>';" name="s" id="s3" class="search-input" />
</form>

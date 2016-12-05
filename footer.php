<div class="footer-wrap">
		<?php $optionz = get_option("magazin_theme_options");
		if (!empty($optionz['article_ad_bottom'])) {  ?>
			<div class="advertise text-center">
				<?php echo html_entity_decode($optionz['article_ad_bottom']); ?>
			</div>
		<?php } ?>
	<?php $option = get_option("boomnews_theme_options"); ?>
	<?php if(!empty($option['footer_page'])){ ?>
		<?php $footer_page = $option['footer_page']; ?>
		<?php $footer = new WP_Query("page_id=$footer_page"); while($footer->have_posts()) : $footer->the_post(); ?>
			<div class="container footer-page">
				<?php the_content(); ?>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php } ?>
	<?php if(!empty($option['footer_top']) or !empty($option['footer_bottom'])){ ?>
		<div class="footer">
			<?php boomnews_footer_3(); ?>
		</div>
	<?php } ?>
	</div>
</div>
<a href="#" class="footer-scroll-to-top mt-theme-background"></a>
<?php  wp_footer(); ?>
</body>
</html>

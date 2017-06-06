<?php function infowazz_single_cat() {?>

  <div class="single-cat-wrap"><?php echo get_the_category_list(); ?></div>

<?php } ?>
<?php function infowazz_single_cat_posts() {

  $category_name = get_the_category(get_the_ID()); $cat =""; if(!empty($category_name[0])) { $cat =''.$category_name[0]->slug.''; } if ( shortcode_exists( 'posts' ) ) { echo do_shortcode('[posts item_nr=5  category="'.$cat.'" type=small-bottom ]'); }

} ?>
<?php function infowazz_single_title() {?>
  <h1 class="single-title" itemprop="headline"><?php echo get_the_title(); ?></h1>
  <h2 class="single-subtitle" itemprop="description"><?php echo get_post_meta(get_the_ID(), "magazin_subtitle", true); ?></h2>
<?php } ?>
<?php function infowazz_single_social() {
$share_top = "";
$share_top = get_post_meta(get_the_ID(), "magazin_post_share_top", true);

/* Share Meta from Magazin framework */
$share = get_post_meta(get_the_ID(), "magazin_share_count", true);
$shares = "0";
if (function_exists('magazin_theme_setup')) {
  $shares = magazin_get_shares(get_the_ID());
}
if (!empty($share)){
	$shares = $share+$shares;
}
$shares = number_format($shares);
/* View Meta from Magazin framework */
$view = get_post_meta(get_the_ID(), "magazin_view_count", true);
$views = get_post_meta(get_the_ID(), "magazin_post_views_count", true);
$viewes = $views + "0";
if (!empty($view)){ $viewes = $view + $views; $viewes = number_format($viewes); }

$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));

?>
  <div class="after-title">
    <div class="pull-left">
      <div class="author-img pull-left">
        <?php global $post; echo get_avatar( $post->post_author, 30 ); ?>
      </div>
      <div class="author-info">
        <div class="mt-author-soc hidden">
          <?php $twitterHandle = get_the_author_meta('twitter');
          $facebookHandle = get_the_author_meta('facebook');
          $googleHandle = get_the_author_meta('gplus');
          $instagramHandle = get_the_author_meta('instagram');
          $linkedinHandle = get_the_author_meta('linkedin');
          $pinterestHandle = get_the_author_meta('pinterest');
          $youtubeHandle = get_the_author_meta('youtube');
          $dribbbleHandle = get_the_author_meta('dribbble'); ?>
          <?php if(!empty($twitterHandle)) { ?><a class="mt-bio-twitter" href="<?php echo $twitterHandle; ?>"></a> <?php } ?>
          <?php if(!empty($facebookHandle)) { ?><a class="mt-bio-facebook" href="<?php echo $facebookHandle; ?>"></a> <?php } ?>
          <?php if(!empty($googleHandle)) { ?><a class="mt-bio-google" href="<?php echo $googleHandle; ?>"></a> <?php } ?>
          <?php if(!empty($instagramHandle)) { ?><a class="mt-bio-instagram" href="<?php echo $instagramHandle; ?>"></a> <?php } ?>
          <?php if(!empty($linkedinHandle)) { ?><a class="mt-bio-linkedin" href="<?php echo $linkedinHandle; ?>"></a> <?php } ?>
          <?php if(!empty($pinterestHandle)) { ?><a class="mt-bio-pinterest" href="<?php echo $pinterestHandle; ?>"></a> <?php } ?>
          <?php if(!empty($youtubeHandle)) { ?><a class="mt-bio-youtube" href="<?php echo $youtubeHandle; ?>"></a> <?php } ?>
          <?php if(!empty($dribbbleHandle)) { ?><a class="mt-bio-dribbble" href="<?php echo $dribbbleHandle; ?>"></a> <?php } ?>
        </div>
        <strong><?php the_author_posts_link(); ?></strong>
        <small class="color-silver-light"><?php echo get_the_date(); ?></small>
      </div>
    </div>
    <?php if ( false == get_theme_mod( 't_p_shares', false ) ) { $t_p_shares = esc_html__("Shares", "infowazz");  } else { $t_p_shares = get_theme_mod( 't_p_shares' ); } ?>
    <?php if ( false == get_theme_mod( 't_p_views', false ) ) { $t_p_views = esc_html__("Views", "infowazz");  } else { $t_p_views = get_theme_mod( 't_p_views' ); } ?>
    <?php if ( false == get_theme_mod( 't_c_comments', false ) ) { $t_c_comments = esc_html__("Comments", "infowazz");  } else { $t_c_comments = get_theme_mod( 't_c_comments' ); } ?>
    <?php if ( false == get_theme_mod( 't_p_share_on_facebook', false ) ) { $t_p_share_on_facebook = esc_html__("Share on Facebook", "infowazz");  } else { $t_p_share_on_facebook = get_theme_mod( 't_p_share_on_facebook' ); } ?>
    <?php if ( false == get_theme_mod( 't_p_share_on_twitter', false ) ) { $t_p_share_on_twitter = esc_html__("Tweet on Twitter", "infowazz");  } else { $t_p_share_on_twitter = get_theme_mod( 't_p_share_on_twitter' ); } ?>
    <?php if(function_exists('mt_header_script')) { ?>
    <div class="post-statistic pull-left">
      <?php if(!empty($shares)){ ?><span class="stat-shares"><?php echo esc_attr($shares); ?> <?php echo esc_html($t_p_shares); ?></span><?php } ?>
      <?php if(!empty($viewes)){ ?><span class="stat-views"><?php echo esc_attr($viewes); ?> <?php echo esc_html($t_p_views); ?></span><?php } ?>
    </div>
    <?php } ?>
    <div class="single-stat-comments">
      <?php if (get_comments_number()!="0") { ?><span class="stat-comments"><?php echo get_comments_number(); ?> <?php echo esc_html($t_c_comments); ?></span><?php } ?>
    </div>
      <?php if($share_top == "no"){} else if($share_top == "yes"){ ?>
    <ul class="share top">
      <li class="share-facebook"><a class="mt-radius" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank"><span><?php echo esc_html($t_p_share_on_facebook); ?></span></a></li>
      <?php $input = get_the_title().' '.get_the_permalink(); $title = str_replace( ' ', '+', $input ); ?>
      <li class="share-twitter"><a class="mt-radius" href="http://twitter.com/home/?status=<?php echo esc_attr($title); ?>" target="_blank"><span><?php echo esc_html($t_p_share_on_twitter); ?></span></a></li>
      <li class="share-more">
        <div class="share-more-wrap"><div class="share-more-icon mt-radius">+</div></div>

        <a class="mt-radius" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&media=<?php echo esc_url($url); ?>" target="_blank"><div class="pinterest mt-radius-b"></div></a>
        <a class="mt-radius" href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank"><div class="google mt-radius-b"></div></a>

      </li>
    </ul>
    <?php } else if ( true == get_theme_mod( 'mt_post_top_share', true ) ) {  ?>
      <ul class="share top">
        <li class="share-facebook"><a class="mt-radius" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank"><span><?php echo esc_html($t_p_share_on_facebook); ?></span></a></li>
        <?php $input = get_the_title().' '.get_the_permalink(); $title = str_replace( ' ', '+', $input ); ?>
        <li class="share-twitter"><a class="mt-radius" href="http://twitter.com/home/?status=<?php echo esc_attr($title); ?>" target="_blank"><span><?php echo esc_html($t_p_share_on_twitter); ?></span></a></li>
        <li class="share-more">
          <div class="share-more-wrap"><div class="share-more-icon mt-radius">+</div></div>

          <a class="mt-radius" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&media=<?php echo esc_url($url); ?>" target="_blank"><div class="pinterest mt-radius-b"></div></a>
          <a class="mt-radius" href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank"><div class="google mt-radius-b"></div></a>

        </li>
      </ul>
    <?php } ?>
    <div class="clearfix"></div>
  </div>

<?php } ?>

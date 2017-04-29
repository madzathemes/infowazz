<?php
/**
 * @author madars.bitenieks
 * @copyright 2017
 */
 if ( false == get_theme_mod( 't_c_comments_passowrd', false ) ) { $t_c_comments_passowrd = esc_html__("This post is password protected. Enter the password to view and post comments.", "infowazz");  } else { $t_c_comments_passowrd = get_theme_mod( 't_c_comments_passowrd' ); }
 if ( false == get_theme_mod( 't_c_name', false ) ) { $t_c_name = esc_html__("Name", "infowazz");  } else { $t_c_name = get_theme_mod( 't_c_name' ); }
 if ( false == get_theme_mod( 't_c_email', false ) ) { $t_c_email = esc_html__("Email", "infowazz");  } else { $t_c_email = get_theme_mod( 't_c_email' ); }
 if ( false == get_theme_mod( 't_c_website', false ) ) { $t_c_website = esc_html__("Website", "infowazz");  } else { $t_c_website = get_theme_mod( 't_c_website' ); }
 if ( false == get_theme_mod( 't_c_email_not_publish', false ) ) { $t_c_email_not_publish = esc_html__("Your email address will not be published.", "infowazz");  } else { $t_c_email_not_publish = get_theme_mod( 't_c_email_not_publish' ); }
 if ( false == get_theme_mod( 't_c_leave_a_comment', false ) ) { $t_c_leave_a_comment = esc_html__("Leave a Comment", "infowazz");  } else { $t_c_leave_a_comment = get_theme_mod( 't_c_leave_a_comment' ); }
 if ( false == get_theme_mod( 't_c_leave_a_reply_to', false ) ) { $t_c_leave_a_reply_to = esc_html__("Leave a Reply to %s", "infowazz");  } else { $t_c_leave_a_reply_to = get_theme_mod( 't_c_leave_a_reply_to' )." %s"; }
 if ( false == get_theme_mod( 't_c_submit_comment', false ) ) { $t_c_submit_comment = esc_html__("Submit Comment", "infowazz");  } else { $t_c_submit_comment = get_theme_mod( 't_c_submit_comment' ); }

 if ( false == get_theme_mod( 't_c_comments', false ) OR false == get_theme_mod( 't_c_one_comment', false ) ) { $t_c_comments_ = _n( 'One Comment', '%1$s Comments', get_comments_number(), 'infowazz' );  } else { $t_c_comments = get_theme_mod( 't_c_comments' ); $t_c_one_comment = get_theme_mod( 't_c_one_comment' ); $t_c_comments_ = _n( $t_c_one_comment, '%1$s '. $t_c_comments.'', get_comments_number(), 'infowazz');  }
 
 $infowazz_allowed_html_array = array('a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
 if ( false == get_theme_mod( 't_c_older_comments', false ) ) { $t_c_older_comments = wp_kses(__( '<span class="meta-nav">&larr;</span> Older Comments', 'infowazz' ), $infowazz_allowed_html_array );  } else { $t_c_older_comments = get_theme_mod( 't_c_older_comments' ); $t_c_older_comments = wp_kses(( '<span class="meta-nav">&larr;</span> '.$t_c_older_comments), $infowazz_allowed_html_array ); }
 if ( false == get_theme_mod( 't_c_newer_comments', false ) ) { $t_c_newer_comments = wp_kses(__( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'infowazz' ), $infowazz_allowed_html_array );  } else { $t_c_newer_comments = get_theme_mod( 't_c_newer_comments' ); $t_c_newer_comments = wp_kses(( $t_c_newer_comments.' <span class="meta-nav">&rarr;</span>'), $infowazz_allowed_html_array ); }

?>
<?php if ( comments_open() ) { ?><div class="mt-comment-area"><?php } ?>
<?php if ( post_password_required() ): ?>
     <p class="nopassword"><?php echo esc_html($t_c_comments_passowrd); ?></p>

<?php
        return;
      endif;
?>

<?php if ( have_comments() ) : ?>
<div id="coment-line-space"></div>

			<h4 class="heading-left padding-0 mt-comment-head"><span><?php
			printf( $t_c_comments_, 	number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?></span></h4>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation mt-coment-nav mt-comment-nav-top">
				<div class="nav-previous"><?php previous_comments_link( $t_c_older_comments); ?></div>
				<div class="nav-next"><?php next_comments_link( $t_c_newer_comments); ?></div>
			</div> <!-- .navigation -->
      <div class="clearfix"></div>
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'infowazz_comment' ) );
				?>
			</ol>
            <div class="line-comment"></div>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?


?>
			<div class="navigation mt-coment-nav">
        <div class="nav-previous"><?php previous_comments_link( $t_c_older_comments); ?></div>
        <div class="nav-next"><?php next_comments_link( $t_c_newer_comments); ?></div>
			</div><!-- .navigation -->
      <div class="clearfix"></div>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	if ( ! comments_open() ) :
?>

<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ? ?>
<!--<div><span class="line"></span></div>-->

<?php
$fields =  array(
  'author' => '<div class="row"><div class="comment-input col-md-4 mt_comment_i_1"><input id="author" placeholder="'. esc_html($t_c_name) .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
  'email'  => '<div class="comment-input col-md-4 mt_comment_i_2"><input id="email" name="email" type="text"  placeholder="'. esc_html($t_c_email) .'" value="' . esc_html(  $commenter['comment_author_email'] ) . '" size="30" /></div>',
	'url'    => '<div class="comment-input col-md-4 mt_comment_i_3"><input class="input" id="url" name="url"  placeholder="'. esc_html($t_c_website) .'" type="text" value="' . esc_url( $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
);

if ( false == get_theme_mod( 't_c_you_must_be', false ) OR false == get_theme_mod( 't_c_logged_in', false ) OR false == get_theme_mod( 't_c_to_post_a_comment', false ) ) { $t_c_must_log_in = wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.', 'infowazz' ), $infowazz_allowed_html_array );  } else { $t_c_you_must_be = get_theme_mod( 't_c_you_must_be' ); $t_c_logged_in = get_theme_mod( 't_c_logged_in' ); $t_c_to_post_a_comment = get_theme_mod( 't_c_to_post_a_comment' ); $t_c_must_log_in = $t_c_you_must_be .' <a href="%s">'.$t_c_logged_in.'</a> '.$t_c_to_post_a_comment;  }
if ( false == get_theme_mod( 't_c_loged_in_as', false ) OR false == get_theme_mod( 't_c_log_out', false ) ) { $t_c_loged_in_as = wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account" class="mt-theme-text">Log out?</a>', 'infowazz' ), $infowazz_allowed_html_array );  } else { $t_c_loged_in_as = get_theme_mod( 't_c_loged_in_as' ); $t_c_log_out = get_theme_mod( 't_c_log_out' ); $t_c_log_out_of_this = get_theme_mod( 't_c_log_out_of_this' ); $t_c_loged_in_as = $t_c_loged_in_as.' <a href="%1$s">%2$s</a>. <a href="%3$s" title="'.$t_c_log_out_of_this.'" class="mt-theme-text">'.$t_c_log_out.'</a>';  }

 $defaults = array(
  'comment_field'        => '<span class="comment-adres-not-publish">'. esc_html($t_c_email_not_publish) .'</span><p class="comment-textarea"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" ></textarea></p>',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => esc_html($t_c_leave_a_comment),
	'title_reply_to'       => esc_html($t_c_leave_a_reply_to),
	'cancel_reply_link'    => ' ',
  'comment_notes_before' => ' ',
	'label_submit'         => esc_html($t_c_submit_comment),
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
  'must_log_in'          => '<p class="must-log-in">' .  sprintf($t_c_must_log_in , wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID()) ) ) ) . '</p>',
  'logged_in_as'         => '<p class="logged-in-as">' . sprintf($t_c_loged_in_as , admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</p>',

);?>

<?php
 comment_form($defaults); ?>
<?php if ( comments_open() ) { ?></div><?php } ?>

<!-- #comments -->

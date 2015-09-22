<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Denna post &auml;r l&ouml;senordsskyddad. Ange l&ouml;senord f&ouml;r att se kommentarer.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('Inga kommentarer', 'En kommentar', '% kommentarer' );?> till &#8220;<?php the_title(); ?>&#8221;</h3>
    
    <div class="navigation"> 
		<div class="alignleft"><?php previous_comments_link() ?></div> 
		<div class="alignright"><?php next_comments_link() ?></div> 
 	</div>

	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>
    
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Kommentering avst&auml;ngd.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title( 'L&auml;mna en kommentar', 'L&auml;mna en kommentar till %s' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Du m&aring;ste vara <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">inloggad</a> f&ouml;r att posta kommentarer.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Inloggad som <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Logga ut">Logga ut &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Namn <?php if ($req) echo "(obligatoriskt)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>E-post (visas inte) <?php if ($req) echo "(obligatoriskt)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Hemsida</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Du kan anv&auml;nda f&ouml;ljande taggar: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Skicka kommentar" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
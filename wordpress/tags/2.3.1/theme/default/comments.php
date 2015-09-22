<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Detta inl&auml;gg &auml;r l&ouml;senordsskyddat. Ange l&ouml;senord f&ouml;r att se kommentarer.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Inga svar', 'Ett svar', '% svar' );?> till &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment, 32 ); ?>
			<cite><?php comment_author_link() ?></cite> skriver:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Din kommentar inv&auml;ntar granskning.</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F, Y') ?> kl <?php comment_time() ?></a> <?php edit_comment_link('redigera','&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Kommentering avst&auml;ngd.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Kommentera</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Du m&aring;ste vara <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">inloggad</a> f&ouml;r att kunna posta kommentarer.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Inloggad som <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logga ut &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Namn <?php if ($req) echo "(obligatoriskt)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>E-post (visas ej) <?php if ($req) echo "(obligatoriskt)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Hemsida</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Du kan anv&auml;nda f&ouml;ljande taggar: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Skicka kommentar" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

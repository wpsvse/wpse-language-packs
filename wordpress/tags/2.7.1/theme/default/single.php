<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('<p class="serif">L&auml;s mer &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Sidor:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Etiketter: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						Detta inl&auml;gg postades
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						<?php the_time('l, j F, Y') ?> kl <?php the_time() ?>
						i <?php the_category(', ') ?>.
						Du kan f&ouml;lja svar via <?php post_comments_feed_link('RSS 2.0'); ?> fl&ouml;det.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Du kan <a href="#respond">l&auml;mna en kommentar</a>, eller en <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> fr&aring;n din egen sida.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Kommentering &auml;r avst&auml;ngd, men du kan l&auml;mna en <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> fr&aring;n din egen sida.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Du kan hoppa till slutet f&ouml;r att kommentera. Pingning &auml;r inte till&aring;ten.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							B&aring;de pingning och kommentering &auml;r avst&auml;ngt.

						<?php } edit_post_link('Redigera.','',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Beklagar, inga inl&auml;gg matchade dina kriterier.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>

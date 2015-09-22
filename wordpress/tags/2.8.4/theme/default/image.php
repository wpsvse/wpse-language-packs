<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>

				<?php the_content('<p class="serif">L&auml;s mer &raquo;</p>'); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
				</div>
				<br class="clear" />

				<p class="postmetadata alt">
					<small>
						Denna bild postades <?php the_time('l, j F, Y') ?> kl <?php the_time() ?>
						i <?php the_category(', ') ?>.
						<?php the_taxonomies(); ?>
						Du kan f&ouml;lja svar via <?php post_comments_feed_link('RSS 2.0'); ?> fl&ouml;det.

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							Du kan <a href="#respond">l&auml;mna en kommentar</a>, eller en <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> fr&aring;n din egen sida.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Kommentering &auml;r avst&auml;ngd, men du kan l&auml;mna en <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> fr&aring;n din egen sida.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							Du kan hoppa till slutet f&ouml;r att kommentera. Pingning &auml;r inte till&aring;ten.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							B&aring;de pingning och kommentering &auml;r avst&auml;ngt.

						<?php } edit_post_link('Redigera.','',''); ?>

					</small>
				</p>

			</div>

		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Beklagar, inga bilagor matchade dina kriterier.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>

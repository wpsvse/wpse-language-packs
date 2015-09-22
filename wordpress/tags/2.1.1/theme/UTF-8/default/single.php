<?php get_header(); ?>

	<div id="content" class="widecolumn">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent länk: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	
			<div class="entrytext">
				<?php the_content('<p class="serif">Läst resten av det här inlägget &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Sidor:</strong> ', '</p>', 'nummer'); ?>
	
				<p class="postmetadata alt">
					<small>
						Det här inlägget publicerades 
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						<?php the_time('l j F, Y') ?> kl. <?php the_time() ?>
						i <?php the_category(', ') ?>.
						Du kan följa kommentarer genom <?php comments_rss_link('RSS 2.0'); ?>. 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Du kan <a href="#respond">lämna en kommentar</a>, eller <a href="<?php trackback_url(true); ?>" rel="trackback">trackbacka</a> från din egen webbplats.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Kommentarer är avstängda just nu, men du kan <a href="<?php trackback_url(true); ?> " rel="trackback">trackbacka</a> från din egen webbplats.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Du kan hoppa till slutet och lämna en kommentar. Pingar är avstängda just nu.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Såväl kommentarer som pingar är avstängda just nu.
						
						<?php } edit_post_link('Redigera detta inlägg.','',''); ?>
						
					</small>
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>Tyvärr, inga inlägg motsvarade dina sökord.</p>
	
<?php endif; ?>
	
	</div>

<?php get_footer(); ?>

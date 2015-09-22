<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent L&auml;nk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('j F, Y') ?> <!-- av <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('L&auml;s mer &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Etiketter: ', ', ', '<br />'); ?> Postat i <?php the_category(', ') ?> | <?php edit_post_link('Redigera', '', ' | '); ?>  <?php comments_popup_link('Kommentera &#187;', '1 Kommentar &#187;', '% Kommentarer &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; &Auml;ldre inl&auml;gg') ?></div>
			<div class="alignright"><?php previous_posts_link('Nyare inl&auml;gg &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Kunde inte hittas</h2>
		<p class="center">Beklagar, du letar efter något som inte finns h&auml;r.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

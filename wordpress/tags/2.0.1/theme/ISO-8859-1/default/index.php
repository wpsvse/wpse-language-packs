<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent länk till <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l j F, Y') ?> kl. <?php the_time() ?> <!-- by <?php the_author() ?> --></small>
				
				<div class="entry">
					<?php the_content('Läs resten av det här inlägget &raquo;'); ?>
				</div>
		
				<p class="postmetadata">Publicerat i <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Redigera','','<strong>|</strong>'); ?>  <?php comments_popup_link('Inga kommentarer &#187;', '1 kommentar &#187;', '% kommentarer &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Tidigare inlägg') ?></div>
			<div class="alignright"><?php previous_posts_link('Senare inlägg &raquo;') ?></div>
		</div>
		
	<?php else : ?>

		<h2 class="center">Inga sökträffar</h2>
		<p class="center">Tyvärr, du verkar söka efter något som inte finns här.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

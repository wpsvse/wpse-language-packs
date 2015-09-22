<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entrytext">
				<?php the_content('<p class="serif">Läs resten av den här sidan &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Sidor:</strong> ', '</p>', 'nummer'); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Redigera detta inlägg.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
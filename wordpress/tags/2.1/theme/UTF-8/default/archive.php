<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h2 class="pagetitle">Arkiv för kategorin '<?php echo single_cat_title(); ?>'</h2>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Arkiv för <?php the_time('j F, Y'); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Arkiv för <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Arkiv för <?php the_time('Y'); ?></h2>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle">Sökresultat</h2>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Författararkiv</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Arkiv</h2>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Tidigare inlägg') ?></div>
			<div class="alignright"><?php previous_posts_link('Senare inlägg &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent länk till <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l j F, Y') ?> kl. <?php the_time() ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
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
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
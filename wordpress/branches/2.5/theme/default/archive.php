<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Arkiv f&ouml;r &#8216;<?php single_cat_title(); ?>&#8217; kategorin</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Inl&auml;gg med etikett &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Arkiv f&ouml;r <?php the_time('j F, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Arkiv f&ouml;r <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Arkiv f&ouml;r <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">F&ouml;rfattararkiv</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Bloggarkiv</h2>
 	  <?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; &Auml;ldre poster') ?></div>
			<div class="alignright"><?php previous_posts_link('Nyare poster &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent L&auml;nk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, j F, Y') ?></small>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata"><?php the_tags('Etiketter: ', ', ', '<br />'); ?> Postat i <?php the_category(', ') ?> | <?php edit_post_link('Redigera', '', ' | '); ?>  <?php comments_popup_link('0 Kommentarer &#187;', '1 Kommentar &#187;', '% Kommentarer &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; &Auml;ldre poster') ?></div>
			<div class="alignright"><?php previous_posts_link('Nyare poster &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Kunde inte hittas</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

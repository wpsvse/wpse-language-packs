<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent l&auml;nk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('j F, Y') ?> <!-- av <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('L&auml;s mer &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Etiketter: ', ', ', '<br />'); ?> Postat i <?php the_category(', ') ?> | <?php edit_post_link('Redigera', '', ' | '); ?>  <?php comments_popup_link('Inga kommentarer &#187;', '1 kommentar &#187;', '% kommentarer &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; &Auml;ldre poster') ?></div>
			<div class="alignright"><?php previous_posts_link('Nyare poster &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Kunde inte hittas</h2>
		<p class="center">Beklagar, du letar efter n&aring;got som inte kunde hittas h&auml;r.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

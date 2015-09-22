<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">S&ouml;kresultat</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; &Auml;ldre poster') ?></div>
			<div class="alignright"><?php previous_posts_link('Nyare poster &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent l&auml;nk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, j F, Y') ?></small>

				<p class="postmetadata"><?php the_tags('Etiketter: ', ', ', '<br />'); ?> Postat i <?php the_category(', ') ?> | <?php edit_post_link('Redigera', '', ' | '); ?>  <?php comments_popup_link('Inga kommentarer &#187;', '1 kommentar &#187;', '% kommentarer &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; &Auml;ldre poster') ?></div>
			<div class="alignright"><?php previous_posts_link('Nyare poster &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Inget funnet, testa nya s&ouml;kord?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
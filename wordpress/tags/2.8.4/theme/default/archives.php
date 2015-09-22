<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

<?php get_search_form(); ?>

<h2>M&aring;nadsarkiv:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>&Auml;mnesarkiv:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>

<?php get_footer(); ?>

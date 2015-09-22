<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

<h2>L&auml;nkar:</h2>
<ul>
<?php wp_list_bookmarks(); ?>
</ul>

</div>

<?php get_footer(); ?>

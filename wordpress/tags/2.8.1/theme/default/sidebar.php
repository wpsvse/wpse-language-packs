<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar" role="complementary">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<li>
				<?php get_search_form(); ?>
			</li>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>F&ouml;rfattare</h2>
			<p>N&aring;gon liten text om dig sj&auml;lv.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>Du bl&auml;ddrar just nu i arkivet f&ouml;r kategori <?php single_cat_title(''); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>Du bl&auml;ddrar just nu i arkivet p&aring; <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a>  
			f&ouml;r <?php the_time('l, j F, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>Du bl&auml;ddrar just nu i arkivet p&aring; <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> 
			f&ouml;r <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>Du bl&auml;ddrar just nu i arkivet p&aring; <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> 
			f&ouml;r &aring;ret <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>Du har s&ouml;kt i arkivet p&aring; <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> 
			efter <strong>'<?php the_search_query(); ?>'</strong>. Om du inte hittar det du s&ouml;ker i dessa resultat, f&ouml;rs&ouml;k med n&aring;gon av dessa l&auml;nkar.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>Du bl&auml;ddrar just nu i arkivet p&aring; <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a>.</p>

			<?php } ?>

			</li> 
	        <?php }?> 
	        </ul> 
            </ul> 
	        <ul role="navigation">

			<?php wp_list_pages('title_li=<h2>Sidor</h2>' ); ?>

			<li><h2>Arkiv</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>Kategorier</h2>'); ?>
            
            </ul> 
	        <ul> 

			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="Denna sida validerar som XHTML 1.0 Transitional">Validerande <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Drivs med WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>

			<?php endif; ?>
		</ul>
	</div>


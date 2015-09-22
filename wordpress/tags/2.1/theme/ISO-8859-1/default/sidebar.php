	<div id="sidebar">
		<ul>
			
			<li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<li>
			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>Du visar för närvarande arkiven för kategorin <?php single_cat_title(''); ?>.</p>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>Du visar för närvarande arkiven på <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> för dagen <?php the_time('l j F, Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>Du visar för närvarande arkiven på <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> för <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>Du visar för närvarande arkiven på <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> för år <?php the_time('Y'); ?>.</p>
			
		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>Du har sökt i arkiven på <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> efter <strong>'<?php echo wp_specialchars($s); ?>'</strong>. Om du inte hittar vad du söker bland resultat, pröva en av dessa länkar.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>Du visar för närvarande arkiven på <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>.</p>

			<?php } ?>
			</li>

			<?php wp_list_pages('title_li=<h2>Sidor</h2>' ); ?>

			<li><h2>Arkiv</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<li><h2>Kategorier</h2>
				<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
				</ul>
			</li>

			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
				<?php get_links_list(); ?>
				
				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="Denna sida validerar som XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Drivs av WordPress, en toppmodern, semantisk publiceringsplattform">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>
			
		</ul>
	</div>


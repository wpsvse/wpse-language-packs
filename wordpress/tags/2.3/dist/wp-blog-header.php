<?php

if (! isset($wp_did_header)):
if ( !file_exists( dirname(__FILE__) . '/wp-config.php') ) {
	if (strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) $path = '';
	else $path = 'wp-admin/';

	require_once( dirname(__FILE__) . '/wp-includes/classes.php');
	require_once( dirname(__FILE__) . '/wp-includes/functions.php');
	require_once( dirname(__FILE__) . '/wp-includes/plugin.php');
	wp_die("Filen <code>wp-config.php</code> verkar inte finnas. Jag behöver den innan vi kan börja. Behöver du mer hjälp? <a href='http://codex.wordpress.org/Editing_wp-config.php'>Här, varsågod</a>. Du kan <a href='{$path}setup-config.php'>göra en <code>wp-config.php</code>-fil med ett webbgränssnitt</a>, men det fungerar inte med alla servrar. Det säkraste sättet är att skapa filen manuellt.", "WordPress &rsaquo; Fel");
}

$wp_did_header = true;

require_once( dirname(__FILE__) . '/wp-config.php');

wp();
gzip_compression();

require_once(ABSPATH . WPINC . '/template-loader.php');

endif;

?>

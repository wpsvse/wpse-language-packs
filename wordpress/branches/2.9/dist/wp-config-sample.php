<?php
/** 
 * Baskonfiguration för WordPress.
 *
 * Denna fil innehåller följande konfigurationer: MySQL inställningar, Tabellprefix,
 * Säkerhetsnycklar, WordPress Språk, och ABSPATH. Du kan hitta med information genom
 * att besöka {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php}. Dina MySQL uppgifter för du från ditt webbhotell.
 *
 * Denna fil används av wp-config.php genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * @package WordPress
 */

// ** MySQL inställningar - MySQL uppgifter för du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'ange-databasnamn');

/** MySQL databasens användarnamn */
define('DB_USER', 'ange-databasanvandare');

/** MySQL databasens lösenord */
define('DB_PASSWORD', 'ange-ditt-databaslosenord');

/** MySQL server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp för databasen. ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'ange en unik fras');
define('SECURE_AUTH_KEY', 'ange en unik fras');
define('LOGGED_IN_KEY', 'ange en unik fras');
define('NONCE_KEY', 'ange en unik fras');
/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast nummer, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Språk, förinställt för svenska.
 *
 * Du kan ändra detta för att ändra språk för WordPress.  En motsvarande .mo fil
 * för det valda språket måste finnas i wp-content/languages. Exempel, lägg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' för att få sidan
 * på svenska.
 */
define ('WPLANG', 'sv_SE');

/* Det var allt, sluta redigera här! Blogga på. */

/** WordPress absoluta sökväg till Wordpress katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');
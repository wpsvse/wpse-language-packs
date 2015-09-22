<?php
// ** MySQL-inst�llningar ** //
define('DB_NAME', 'putyourdbnamehere');    // Databasens namn
define('DB_USER', 'usernamehere');     // Ditt MySQL-användarnamn
define('DB_PASSWORD', 'yourpasswordhere'); // ...och lösenord
define('DB_HOST', 'localhost');    // 99% chans att du inte behöver ändra det här
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Du kan ha flera installationer i samma databas om du ger var och en ett unikt prefix
$table_prefix  = 'wp_';   // Endast siffror, bokstäver och _-tecken!

// Här kan du ändra språk i WordPress. En motsvarande MO-fil för det
// valda språket måste finna i katalogen  wp-content/languages.
// Till exempel, installera filen de.mo i wp-content/languages och ändra WPLANG till 'de'
// för att ändra språk till tyska.
define ('WPLANG', 'sv_SE');

/* Det var allt, redigera inte mer! Ha det trevligt med din blogg. */

define('ABSPATH', dirname(__FILE__).'/');
require_once(ABSPATH.'wp-settings.php');
?>

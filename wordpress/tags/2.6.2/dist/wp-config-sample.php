<?php
// ** MySQL inställningar ** //
define('DB_NAME', 'dittdbnamnhär');    // Namnet på databsen
define('DB_USER', 'användarehär');     // Ditt användarnamn för MySQL
define('DB_PASSWORD', 'lösenordhär'); // ...och lösenord
define('DB_HOST', 'localhost');    // 99% chans att du inte behöver ändra detta
define('DB_CHARSET', 'utf8');	// Detta kan behöva ändras beroende på vad du använt för teckenkodning tidigare
define('DB_COLLATE', '');

// Ändra AUTH_KEY, SECURE_AUTH_KEY och LOGGED_IN_KEY till en unika fraser.  Du behöver inte komma ihåg dessa senare,
// så gör dem långa och komplicerade.  Du kan besöka http://api.wordpress.org/secret-key/1.1/
// för att få en hemliga nycklar genererade åt dig, eller hitta helt enklet bara på något.
define('AUTH_KEY', 'ange din hemliga fras här'); // Ändra detta till en unik fras.
define('SECURE_AUTH_KEY', 'ange din hemliga fras här'); // Ändra detta till en unik fras.
define('LOGGED_IN_KEY', 'ange din hemliga fras här'); // Ändra detta till en unik fras.


// Du kan ha flera installationer under samma databas om du ger varje installation ett unikt prefix
$table_prefix  = 'wp_';   // Endast nummer, bokstäver och understreck tack!

// Detta används för att lokalisera WordPress till motsvarande MO-fil.
// Vald språkfil måste installeras under wp-content/languages.
// I den svenska versionen så finns sv_SE.mo installerat under wp-content/languages
// och som du ser så har WPLANG värdet "sv_SE".
define ('WPLANG', 'sv_SE');

/* Det var allt, sluta redigera här! Lycka till med din blogg. */

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
?>

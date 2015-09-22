<?php
// ** MySQL inställningar ** //
define('DB_NAME', 'dittdbnamnhär');    // Namnet på databsen
define('DB_USER', 'användarehär');     // Ditt användarnamn för MySQL
define('DB_PASSWORD', 'lösenordhär'); // ...och lösenord
define('DB_HOST', 'localhost');    // 99% chans att du inte behöver ändra detta
define('DB_CHARSET', 'utf8');	// Detta kan behöva ändras beroende på vad du använt för teckenkodning tidigare
define('DB_COLLATE', '');

// Ändra SECRET_KEY till en unik fras.  Du behöver inte komma ihåg den senare,
// så gör den lång och komplicerad.  Du kan besöka http://api.wordpress.org/secret-key/1.0/
// för att få en hemlig nyckel genererad till dig, eller hitta helt enklet bara på något.
define('SECRET_KEY', 'ange din hemliga fras här'); // Ändra detta till en unik fras.

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

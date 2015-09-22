<?php
/**
 * Retrieves and creates the wp-config.php file.
 *
 * The permissions for the base directory must allow for writing files in order
 * for the wp-config.php to be created using this page.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * We are installing.
 *
 * @package WordPress
 */
define('WP_INSTALLING', true);

/**#@+
 * These three defines are required to allow us to use require_wp_db() to load
 * the database class while being wp-content/db.php aware.
 * @ignore
 */
define('ABSPATH', dirname(dirname(__FILE__)).'/');
define('WPINC', 'wp-includes');
define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
/**#@-*/

require_once('../wp-includes/compat.php');
require_once('../wp-includes/functions.php');
require_once('../wp-includes/classes.php');

if (!file_exists('../wp-config-sample.php'))
	wp_die('Beklagar, vi behöver en wp-config-sample.php fil att arbeta utifrån. Var vänlig ladda upp denna fil från dina WordPress filer.');

$configFile = file('../wp-config-sample.php');

if ( !is_writable('../'))
	wp_die("Beklagar, vi måste kunna skriva till katalogen. Du måste antingen ändra rättigheterna för din WordPress katalog eller skapa din wp-config.php manuellt.");

// Check if wp-config.php has been created
if (file_exists('../wp-config.php'))
	wp_die("<p>Filen 'wp-config.php' finns redan. Om du behöver återställa något värde i filen, var vänlig readera den först. Du kan försöka att <a href='install.php'>installera nu</a>.</p>");

// Check if wp-config.php exists above the root directory
if (file_exists('../../wp-config.php') && ! file_exists('../../wp-load.php'))
	wp_die("<p>Filen 'wp-config.php' finns redan en nivå ovanför din WordPress installation.  Om du behöver återställa något värde i filen, var vänlig readera den först. Du kan försöka att <a href='install.php'>installera nu</a>.</p>");

if (isset($_GET['step']))
	$step = $_GET['step'];
else
	$step = 0;

/**
 * Display setup wp-config.php file header.
 *
 * @ignore
 * @since 2.3.0
 * @package WordPress
 * @subpackage Installer_WP_Config
 */
function display_header() {
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WordPress &rsaquo; Inställning Konfigurationsfil</title>
<link rel="stylesheet" href="css/install.css" type="text/css" />

</head>
<body>
<h1 id="logo"><img alt="WordPress" src="images/wordpress-logo.png" /></h1>
<?php
}//end function display_header();

switch($step) {
	case 0:
		display_header();
?>

<p>Välkommen till WordPress. Innan vi börjar så behöver vi lite databasinformation. Du behöver ha följande uppgifter innan du kan forsätta.</p>
<ol>
	<li>Databasnamn</li>
	<li>Användarnamn för databasen</li>
	<li>Lösenord för databasen</li>
	<li>Serveradress för databasen</li>
	<li>Tabellprefix (om du vill köra flera installationer av WordPress i samma databas) </li>
</ol>
<p><strong>Om av någon anledning denna automatiska konfigurationsfil kan skapas så behöver du inte oroa dig. Allt detta göra är att fylla i databasinformationen i en konfigurationsfil. Du kan helt enkelt bara öppna <code>wp-config-sample.php</code> i en textredigerare, fylla i uppgifterna själv och spara den som <code>wp-config.php</code>. </strong></p>
<p>Det mest troliga är att du fått dessa uppgifter från ditt webbhotell, eller när du skapat en databas. Om du saknar uppgifterna så behöver du kontakta webbhotellet innan du kan fortsätta. Du är helt redo&hellip;</p>

<p class="step"><a href="setup-config.php?step=1" class="button">Då kör vi!</a></p>
<?php
	break;

	case 1:
		display_header();
	?>
<form method="post" action="setup-config.php?step=2">
	<p>Nedan bör du ange dina databasuppgifter. Om du är osäker på vilka dessa är, kontakta ditt webbhotell. </p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="dbname">Databasnamn</label></th>
			<td><input name="dbname" id="dbname" type="text" size="25" value="wordpress" /></td>
			<td>Namnet på databasen du vill använda för WordPress.</td>
		</tr>
		<tr>
			<th scope="row"><label for="uname">Användarnamn</label></th>
			<td><input name="uname" id="uname" type="text" size="25" value="username" /></td>
			<td>MySQL databasens användarnamn.</td>
		</tr>
		<tr>
			<th scope="row"><label for="pwd">Lösenord</label></th>
			<td><input name="pwd" id="pwd" type="text" size="25" value="password" /></td>
			<td>...och MySQL lösenord.</td>
		</tr>
		<tr>
			<th scope="row"><label for="dbhost">Databasserver</label></th>
			<td><input name="dbhost" id="dbhost" type="text" size="25" value="localhost" /></td>
			<td>Det är 99% chans att du inte behöver ändra detta värde.</td>
		</tr>
		<tr>
			<th scope="row"><label for="prefix">Tabellprefix</label></th>
			<td><input name="prefix" id="prefix" type="text" id="prefix" value="wp_" size="25" /></td>
			<td>Om du vill köra flera installationer av WordPress i samma databas, ändra detta.</td>
		</tr>
	</table>
	<p class="step"><input name="submit" type="submit" value="Skicka" class="button" /></p>
</form>
<?php
	break;

	case 2:
	$dbname  = trim($_POST['dbname']);
	$uname   = trim($_POST['uname']);
	$passwrd = trim($_POST['pwd']);
	$dbhost  = trim($_POST['dbhost']);
	$prefix  = trim($_POST['prefix']);
	if (empty($prefix)) $prefix = 'wp_';

	// Test the db connection.
	/**#@+
	 * @ignore
	 */
	define('DB_NAME', $dbname);
	define('DB_USER', $uname);
	define('DB_PASSWORD', $passwrd);
	define('DB_HOST', $dbhost);
	/**#@-*/

	// We'll fail here if the values are no good.
	require_wp_db();
	if ( !empty($wpdb->error) )
		wp_die($wpdb->error->get_error_message());

	$handle = fopen('../wp-config.php', 'w');

	foreach ($configFile as $line_num => $line) {
		switch (substr($line,0,16)) {
			case "define('DB_NAME'":
				fwrite($handle, str_replace("ange-databasnamn", $dbname, $line));
				break;
			case "define('DB_USER'":
				fwrite($handle, str_replace("'ange-databasanvändare'", "'$uname'", $line));
				break;
			case "define('DB_PASSW":
				fwrite($handle, str_replace("'ange-ditt-databaslösenord'", "'$passwrd'", $line));
				break;
			case "define('DB_HOST'":
				fwrite($handle, str_replace("localhost", $dbhost, $line));
				break;
			case '$table_prefix  =':
				fwrite($handle, str_replace('wp_', $prefix, $line));
				break;
			default:
				fwrite($handle, $line);
		}
	}
	fclose($handle);
	chmod('../wp-config.php', 0666);

	display_header();
?>
<p>Ok! Du har fixat det så här långt av installationen. WordPress kan nu kommunicer med din databas. Om du är redo så är det dags att&hellip;</p>

<p class="step"><a href="install.php" class="button">Köra installationen</a></p>
<?php
	break;
}
?>
</body>
</html>

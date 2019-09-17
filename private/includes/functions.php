<?php
if (session_status() == PHP_SESSION_NONE) session_start();

function dbConnect() {

	$config = require __DIR__ . '/config.php';

	try {
		$dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'];

		$connection = new PDO( $dsn, $config['DB_USER'], $config['DB_PASSWORD'] );

		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( \PDOException $e ) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
	}

}

/**
 * Geeft de juiste URL terug voor het opgegeven path
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function url( $path ) {
	return "http://myband-starter.test/public".$path;
}

/**
 * Hier maken we de template engine aan, we geven de template engine het pad naar onze views (templates)
 * @return \League\Plates\Engine
 */
function get_template_engine() {
	global $CONFIG;

	$templates_path  = $CONFIG['PRIVATE'] . '/views';
	$template_engine = new League\Plates\Engine( $templates_path );

	return $template_engine;

}

/**
 * Check if user is logged in
 * 
 * @param none
 * 
 * @return boolean
 */

function loggedIn() {
	if (isset($_SESSION['id'])) return true;
	return false;
}

/**
 * Log in user
 * 
 * @param none
 * 
 * @return int 0 == empty fields | 1 == wrong username/password | 2 == logged in
 */

function logIn() {
	if (!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['password']) || empty($_POST['password'])) return 0;
	if ($_POST['username'] !== "admin" || $_POST['password'] !== "123") return 1;
	$_SESSION['id'] = 1;
	return 2;
}

/**
 * Get all sponsors
 * 
 * @param string title;link, title;link
 * 
 * @return array
 */

 function getSponsors($sponsors) {
	if (strlen($sponsors) == 0) return false;
	$exploded = explode(', ', $sponsors);
	$complete = [];
	foreach($exploded as $sponsor) {
		$sponsorExploded = explode(';', $sponsor);
		$sponsorArr = ['text' => $sponsorExploded[0], 'link' => $sponsorExploded[1]];
		$complete[] = $sponsorArr;
	}
	return $complete;
 }

/**
 * Get all notes
 * 
 * @param string title;link, title;link
 * 
 * @return array
 */

function getNotes($notes) {
	if (strlen($notes) == 0) return false;
	$exploded = explode(', ', $notes);
	$complete = [];
	foreach($exploded as $note) {
		$noteExploded = explode(';', $note);
		$noteArr = ['text' => $noteExploded[0], 'link' => $noteExploded[1]];
		$complete[] = $noteArr;
	}
	return $complete;
 }
<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

db.php Version 1.0.0 

Diese Datei ist Teil von Sievo Haushaltsbuch.

    Sievo Haushaltsbuch ist Freie Software: Sie können es unter den Bedingungen
    der GNU General Public License, wie von der Free Software Foundation,
    Version 3 der Lizenz oder (nach Ihrer Wahl) jeder neueren
    veröffentlichten Version, weiter verteilen und/oder modifizieren.

    Sievo Haushaltsbuch wird in der Hoffnung, dass es nützlich sein wird, aber
    OHNE JEDE GEWÄHRLEISTUNG, bereitgestellt; sogar ohne die implizite
    Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
    Siehe die GNU General Public License für weitere Details.

    Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
    Programm erhalten haben. Wenn nicht, siehe <https://www.gnu.org/licenses/>.*/
$db_host = "localhost";
$db_user = "";
$db_pass = "";
$db_name = "";

$dbprefix = "haushalt_"; // Optional prefix for table names, can be set to empty string if not needed





// ab hier nichts mehr ändern, außer du weißt genau was du tust

define('DEBUG', getenv('DEBUG') ?: 'ON'); // Set to "ON" to display errors, "OFF" to hide them (default: OFF)

if(function_exists('ini_set')){
	if (DEBUG == "ON"){
		ini_set('display_errors', 'On');
		error_reporting(E_ALL);
	}else{
		ini_set('display_errors', 'Off');
		error_reporting(0);
		ini_set('log_errors', 'On');
		ini_set('error_log', 'fehler.txt');
	}
	/** Set memory limit to work with **/
	@ini_set('memory_limit', '32M');
}
// Establish mySQL database connection
try {
    $link = dbconnect($db_host, $db_user, $db_pass, $db_name);
} catch (Throwable $e) {
    // Log full error for admins and show generic message to users
    error_log('Database connection failed: ' . $e->getMessage());
    // Optionally display more info in DEBUG mode
	if (defined('DEBUG') && DEBUG === 'ON') {
		die('<strong>Database connection failed:</strong> ' . htmlspecialchars($e->getMessage()));
	}
    die('Database connection failed. Please check configuration.');
}


function dbconnect($db_host, $db_user, $db_pass, $db_name) {
	global $pdo;
	try {
	$pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name.";charset=utf8mb4", $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	// Return the PDO instance for static analysis and caller usage
	return $pdo;
	} catch (PDOException $error) {
		// Throw a runtime exception so callers can handle the error instead of exiting here
		throw new RuntimeException("Unable to select MySQL database: " . $error->getMessage(), 0, $error);
	}
}

<?php 
	include_once('theme.php');
?>

<?php
	$theme = 'dark'; // Sets the websites theme valid themes are "default, dark, beach"
	
	$cfg_debug = false; // Enable Debugging ** Warning private data dumped to console ***

	$adminUser = "admin";
	$adminPass = "password";
	
	$enablePOD = true; // Enable Password of the day
	
	$enableAds = "true";
	
	// Database stuff
	$servername = "mysql-stfh.alwaysdata.net";
	$username = "stfh_images";
	$password = "MqBcErKqnQCVxh4A";
	$dbname = "stfh_images";
	$tablename = "Files";
	
	define('DB_SERVER', 'mysql-stfh.alwaysdata.net');
	define('DB_USERNAME', 'stfh_images');
	define('DB_PASSWORD', 'MqBcErKqnQCVxh4A');
	define('DB_DATABASE', 'stfh_images');
?>

<?php
	include_once('password_of_the_day.php');
	if ($enablePOD == true) {
		$adminPass = randomPassword();
		if ($debug == true) {
			debug_to_console("Password of the day: " .randomPassword());
		}
	}
?>
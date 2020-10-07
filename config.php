
<?php
	
	$myurl = 'http://stfh.jtrent238.tk'; // Sets the defauld site url Default is stfh.jtrent238.tk
	
	$theme = 'sunflower'; // Sets the websites theme valid themes are "default, dark, beach, sunflower"
	
	$cfg_debug = false; // Enable Debugging ** Warning private data dumped to console ***

	$adminUser = "admin";
	$adminPass = "password";
	
	$enablePOD = true; // Enable Password of the day
	$podPass = 'P@ssw0rd!';
	
	$enableAds = "true";
	
	// Database stuff
	$servername = "mysql-stfh.alwaysdata.net";
	$username = "stfh_images";
	$password = "MqBcErKqnQCVxh4A";
	$dbname = "stfh_images";
	$tablename = "Files";
	
	define('DB_SERVER', $servername);
	define('DB_USERNAME', $username);
	define('DB_PASSWORD', $password);
	define('DB_DATABASE', $dbname);
?>

<?php
	include_once('password_of_the_day.php');
	if ($enablePOD == true) {
		$adminPass = getPasswordOfTheDay();
		if ($debug == true) {
			debug_to_console("Password of the day: " .$adminPass);
		}
	}
	//include_once('ads.php');
?>
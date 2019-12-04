<?php
	include_once('debug.php');
	include_once('config.php');
	

	// Inintialize URL to the variable 
	$url = $_SERVER['REQUEST_URI']; 
		  
	// Use parse_url() function to parse the URL  
	// and return an associative array which 
	// contains its various components 
	$url_components = parse_url($url); 
	  
	// Use parse_str() function to parse the 
	// string passed via URL 
	parse_str($url_components['query'], $params); 
		  
	// Display result 
	if ($params['password'] == $podPass) {
		
		echo "<script>console.log(`Password of the day is: " .getPasswordOfTheDay() . " `);</script>";
		
		if ($debug == true) {
			debug_to_console('Password of the day was obtained!');
		}
	} else { 
		if ($debug == true) {
			debug_to_console('Password of the day was NOT obtained!');
		}
	}
	
	function getPasswordOfTheDay()
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		srand(strtotime("today"));
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
		
	}

	$passwordOTD = getPasswordOfTheDay();
	

	if ($enablePOD == true) {
		$adminPass = $passwordOTD;
	}
?>
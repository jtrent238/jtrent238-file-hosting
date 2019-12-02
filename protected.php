<?php

	include_once('config.php');
	include_once('login.php');

	/* Your password */
	$username = $adminUser; // Gets the administrator username from config.php
	$password = $adminPass; // Gets the administrator password from config.php

	if (empty($_COOKIE['password']) || $_COOKIE['password'] !== $password) {
		// Password not set or incorrect. Send to login.php.
		//header('Location: login.php');
		exit;
	}
?>
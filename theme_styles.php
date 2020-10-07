<?php
	include_once('config.php');
	switch ($theme) {
		case 'default':
			echo('<link rel="stylesheet" href="assets/css/theme/default.css">');
			break;
		case 'dark':
			echo('<link rel="stylesheet" href="assets/css/theme/dark.css">');
			break;
		case 'beach':
			echo('<link rel="stylesheet" href="assets/css/theme/beach.css">');
			break;
		case 'sunflower':
			echo('<link rel="stylesheet" href="assets/css/theme/sunflower.css">');
			break;
		default:
			echo('<link rel="stylesheet" href="assets/css/theme/default.css">');
			break;
	}
?>
<?php
	include_once('config.php');
	
	
	if ($theme == 'default') {
		
		echo('<script>document.getElementById("navbar").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("navbar").classList.add("w3-red");</script>');
	}
	
	if ($theme == 'dark') {


		echo('<script>document.getElementById("navbar").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("navbar").classList.add("w3-dark-grey");</script>');
		
		echo('<script>document.getElementById("uploadCard").classList.remove("w3-indigo");</script>');
		echo('<script>document.getElementById("uploadCard").classList.add("w3-grey");</script>');
		
		echo('<script>document.getElementById("uploadHeader").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("uploadHeader").classList.add("w3-dark-grey");</script>');
		
		echo('<script>document.getElementById("buttonUpload").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("buttonUpload").classList.add("w3-dark-grey");</script>');

		echo('<script>document.getElementById("loginCard").classList.remove("w3-indigo");</script>');
		echo('<script>document.getElementById("loginCard").classList.add("w3-grey");</script>');

		echo('<script>document.getElementById("loginHeader").classList.remove("w3-indigo");</script>');
		echo('<script>document.getElementById("loginHeader").classList.add("w3-dark-grey");</script>');

		echo('<script>document.getElementById("buttonLogin").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("buttonLogin").classList.add("w3-dark-grey");</script>');

		echo('<script>document.getElementById("buttonBack").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("buttonBack").classList.add("w3-dark-grey");</script>');

	}
	
	if ($theme == 'beach') {


		echo('<script>document.getElementById("navbar").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("navbar").classList.add("w3-khaki");</script>');

		echo('<script>document.getElementById("uploadCard").classList.remove("w3-indigo");</script>');
		echo('<script>document.getElementById("uploadCard").classList.add("w3-pale-yellow");</script>');

		echo('<script>document.getElementById("uploadHeader").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("uploadHeader").classList.add("w3-khaki");</script>');

		echo('<script>document.getElementById("buttonUpload").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("buttonUpload").classList.add("w3-khaki");</script>');

		echo('<script>document.getElementById("loginCard").classList.remove("w3-indigo");</script>');
		echo('<script>document.getElementById("loginCard").classList.add("w3-pale-yellow");</script>');

		echo('<script>document.getElementById("loginHeader").classList.remove("w3-indigo");</script>');
		echo('<script>document.getElementById("loginHeader").classList.add("w3-khaki");</script>');

		echo('<script>document.getElementById("buttonLogin").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("buttonLogin").classList.add("w3-khaki");</script>');

		echo('<script>document.getElementById("buttonBack").classList.remove("w3-blue");</script>');
		echo('<script>document.getElementById("buttonBack").classList.add("w3-khaki");</script>');

	}
?>
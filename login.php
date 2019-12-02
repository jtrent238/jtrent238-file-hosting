<?php 
	include_once("popup_login.php"); 
?>

<!DOCTYPE html
<html>
	<head>
		<title>jtrent238 File Hosting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<?php include_once('theme_styles.php'); ?>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
		<script>
			//document.getElementById("loginContainer_login").style.display = "block";
			//document.getElementById("login_close_button").style.display = "none";
		</script>
	</head>
	<body>
		<?php

		include_once("config.php");
		
		

		/* Credentials for protected pages*/
		$protectUser = $adminUser; // Gets the administrator username from config.php
		$protectPass = $adminPass; // Gets the administrator password from config.php

		/* Redirects here after login */
		$redirect_after_login = 'index.php';

		/* Will not ask password again for */
		$authTime = strtotime('+15 minutes'); // 15 minutes
		$remember_password = $authTime;
		$remember_password = $authTime;

		if (isset($_POST['password']) && $_POST['password'] == $protectPass) {
			setcookie("password", $protectPass, $remember_password);
			header('Location: ' . $redirect_after_login);
			exit;
		}

		
		//session_start();

		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// username and password sent from form

			$myUserName = mysqli_real_escape_string($conn, $_POST['username']);
			if ($debug == true) {
				debug_to_console('Given Username: ' .$myUsername);
			}
			$myPassword = mysqli_real_escape_string($conn, $_POST['password']);
			if ($debug == true) {
				debug_to_console('Given Password: ' .$myPassword);
			}

			$sql = "SELECT id FROM admin WHERE username = '" .$myUserName ."' AND passcode = '" .$myPassword ."';";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$active = $row['active'];

			$count = mysqli_num_rows($result);

			if ($count == 1) {
				session_register("myUserName");
				$_SESSION['login_user'] = $myUserName;

				header("welcome.php");
			} else {
				$error = "Your Login Name or Password is invalid!";
			}
		}
		?>
		<footer>
			<?php include 'footer.php'; ?> <!-- Adds a footer -->
		</footer>
	</body>
</html>

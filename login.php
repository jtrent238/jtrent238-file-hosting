<?php 

	include("config.php");
	include("debug.php");
	session_start();
	
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
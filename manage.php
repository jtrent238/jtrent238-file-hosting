<!DOCTYPE html
<html>
	<head>
		<title>jtrent238 File Hosting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/manage.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
		<script>
			function manageFile(action, fileName)
			{
				if (action == "delete") {
					console.log("Action was Delete File was: " + fileName);
					
					var r = confirm("Are you sure you want to delete this Image?")
					if (r == true) {
						$.ajax({
							url: 'delete.php',
							data: {'file' : "<?php echo dirname(__FILE__) . '/uploads/'?>" + fileName },
							success: function (response) {
								// do something
								console.log("File: " + fileName + " Was deleted!");
							},
							error: function () {
								// do something
								console.log("Could not delete file: " + fileName + "!");
							}
						});
					}
					
				}
			}
		</script>
	</head>
	<body>
		<?php include 'debug.php'; ?> <!-- Adds debug functions -->
		<?php include 'config.php'; ?> <!-- Adds config -->
		<?php include 'menu.php'; ?> <!-- Adds a top navbar -->
	</body>
</html>

<?php
	$fCount = shell_exec('find uploads -type f | wc -l');
	
	// Database stuff
	$servername = "mysql-stfh.alwaysdata.net";
	$username = "stfh_images";
	$password = "MqBcErKqnQCVxh4A";
	$dbname = "stfh_images";
	$tablename = "Files";
	

	for ($x = 0; $x <= $fCount; $x++) {
	}
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT fileName, fileSize FROM " .$tablename ." ORDER BY FileName;";
		$result = $conn->query($sql);

		//$num_rows = mysql_num_rows($sql);
		if ($conn->query($sql) === TRUE) {
			if ($debug == true) {
				debug_to_console($sql);
				//debug_to_console("New record created successfully");
			}

		} else {
			if ($debug == true) {
				debug_to_console("Error: " . $sql . "<br>" . $conn->error);
			}
		}

		if ($result->num_rows > 0) {
			// output data of each row
			echo '<div class="w3-container">';
			while ($row = $result->fetch_assoc()) {
				$fName = $row["fileName"];
				$fSize = $row["fileSize"];
				echo '<div class="w3-quarter">';
				echo '<div class="w3-card w3-green w3-margin">';
				echo '<img src="uploads/' .$fName .'" class="adminImage">';
				echo '<div class="w3-container">';
				echo '<p><a href="uploads/'.$fName .'">' .$fName .'</a></p>';
				echo '<p>File Size: ' .$fSize .' Bytes</p>';
				echo '<a href="javascript:manageFile(`delete`, `' .$fName .'`)" class="w3-btn w3-red w3-margin">Delete</a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		} else {
			echo "";
		}
		
		
	
?>



<!DOCTYPE html
<html>
	<head>
		<?php include_once('inject_head.php'); ?>
		<?php include_once('theme_styles.php'); ?>
		<link rel="stylesheet" href="assets/css/manage.css">
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
							data: {'file0' : "<?php echo dirname(__FILE__) . '/uploads/'?>" + fileName , 'file1' : fileName},
							success: function (response) {
								// do something
								location.reload();
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
		<script>
		function displayLogin(myArg)
		{
			debug = true; // Toggle Debugging

			var modelID;
			var elementID;
			var ClassName;

			// Get the model
			var model = document.getElementById(modelID)

			// Get the button that opens the model
			var btn = document.getElementById(elementID);
			var link = document.getElementById(elementID);

			// Get the <span> element that closes te model
			var span = document.getElementById(ClassName);

			if (myArg == 'login') {
				modelID = "loginContainer_login";
				elementID = "loginContainer_login_open";
				ClassName = "";

				//debug

				if (debug == true) {
					console.log(myArg);
					console.log(modelID);
					console.log(elementID);
					console.log(ClassName);
				}

				// When the user clicks the button, open te modal
				function displayMessage()
				{
					document.getElementById("loginContainer_login").style.display = "block";

					if (debug == true) {
						console.log("opened login form");
					}
				}
				displayMessage();
			}
		}
		</script>
	</head>
	<body>
		<?php include_once 'debug.php'; ?> <!-- Adds debug functions -->
		<?php include_once 'config.php'; ?> <!-- Adds config -->
		<?php include_once 'menu.php'; ?> <!-- Adds a top navbar -->
		<?php include_once 'protected.php'; ?>
		
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

		$sql = "SELECT * FROM " .$tablename ." WHERE isDeleted='false';";
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
				$fID = $row["fileID"];
				$fName = $row["fileName"];
				$fType = $row["fileType"];
				$fDate = $row["fileUploadDate"];
				$fSize = $row["fileSize"];
				echo '<div class="w3-quarter">';
				echo '<div class="w3-card w3-green w3-margin" id="imageCard">';
				echo '<img src="uploads/' .$fName .'" class="adminImage">';
				echo '<div class="w3-container">';
				echo '<p><a href="uploads/'.$fName .'">' .$fName .'</a></p>';
				echo '<p>File ID: ' .$fID .'</br>';
				echo 'File Type: ' .$fType .'</br>';
				echo 'Upload Date: ' .$fDate .'</br>';
				echo 'File Size: ' .$fSize .' Bytes</p>';
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
		
		<footer>
			<?php include 'footer.php'; ?> <!-- Adds a footer -->
		</footer>
	</body>
</html>





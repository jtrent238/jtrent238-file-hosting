<!DOCTYPE html
<html>
	<head>
		<?php include_once('inject_head.php'); ?>
		<?php include_once('theme_styles.php'); ?>
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
		<div class="w3-container ">
			<div class="w3-container">
				<div class="w3-container">
					<div class="w3-container w3-display-middle upload_box">
						<div class="w3-card w3-indigo" id="uploadCard">
							<div class="w3-containter w3-blue" id="uploadHeader">
								<h2 class="w3-xxlarge w3-center">Upload a file!</h2>
							</div>
							<div class="w3-container">
								<form class="form_upload w3-form" name="form_upload" action="upload.php" method="post" enctype="multipart/form-data">
									<label>Select image to upload:</label>

									<input class="inputUpload w3-input w3-border" type="file" name="fileToUpload" id="fileToUpload">
									</<br></br>
									<div class="w3-container uploadAdvanced">
										<label>Email: </label><input class="w3-input" name="email" id="email" type="text"/>
									</div>
									</br>
									<input class="inputSubmit w3-input w3-border w3-button w3-blue" id="buttonUpload" type="submit" value="Upload Image" name="submit">
								</form>
								<?php
									// Database stuff
									$servername = "mysql-stfh.alwaysdata.net";
									$username = "stfh_images";
									$password = "MqBcErKqnQCVxh4A";
									$dbname = "stfh_images";
									$tablename = "Files";
									
									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}

									$sql = "SELECT fileID FROM " .$tablename ." ORDER BY fileID DESC LIMIT 1;";
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
										while ($row = $result->fetch_assoc()) {
											$fTotal = $row["fileID"];
										}
									} else {
										echo "";
									}
									
									$fCount = shell_exec('find uploads -type f | wc -l');
									
									
										echo "<center>";
										echo "Currently hosting " .$fCount ." files.";
										echo "</br>";
										echo "Total files uploaded: " .$fTotal .".";
										echo "</center>";
										echo "</br>";
								?>
							</div>
						</div>
					</div>
					<?php include 'popup_login.php'; ?>
				</div>
			</div>
		</div>
		</br>
		</br>
		<footer>
			<?php include 'footer.php'; ?> <!-- Adds a footer -->
		</footer>
	</body>
</html>

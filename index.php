<!DOCTYPE html
<html>
	<head>
		<title>jtrent238 File Hosting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
		<script data-ad-client="ca-pub-8574266263882010" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
			function displayLogin(myArg) {
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
					function displayMessage() {
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
		<?php include 'debug.php';?> <!-- Adds debug functions -->
		<?php include 'config.php';?> <!-- Adds config -->
		<?php include 'menu.php'; ?> <!-- Adds a top navbar -->
		<div class="w3-container ">
			<div class="w3-container">
				<div class="w3-container">
					<div class="w3-container w3-display-middle upload_box">
						<div class="w3-card w3-indigo">
							<div class="w3-containter w3-blue">
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
									<input class="inputSubmit w3-input w3-border w3-button w3-blue" type="submit" value="Upload Image" name="submit">
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
					<!-- Login Form Start -->
					<div class="w2-container w3-animate-opacity">
						<div id="loginContainer_login" class="w3-modal w3-animate-opacity">
							<div class="w3-container w3-display-middle login_box">
								<div class="w3-card-4 w3-indigo login_box">
									<div class="w3-container w3-blue">
										<h2>Login</h2>
									</div>
									</br>
									<form class="w3-container" method="post" action="login.php">
										<label class="w3-text-white">
											<b>Username:</b></label>
										<input class="w3-input" type="text" name="username" id="username"/>
										</br>
										<label class="w3-text-white">
											<b>Password:</b></label>
										<input  class="w3-input" type="password" name="password" id="password"/>
										</br>
										<button class="w3-btn w3-blue w3-text-white">
											<b>Login</b></button>

									</form>
									</br>
								</div>
							</div>
						</div>
					</div>
					<!-- Login Form End -->
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

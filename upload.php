<!DOCTYPE html
<html>
	<head>
		<?php include_once('inject_head.php'); ?>
		<?php include_once('theme_styles.php'); ?>
		<link rel="stylesheet" href="assets/css/upload.css">
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-8574266263882010",
				enable_page_level_ads: true
			});
		</script>
		<script>
		function goBack()
		{
			window.history.back();
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
		<?php include_once 'popup_login.php'; ?>
		<div class="w3-container-display">
			</br></br>
			<div class="w3-container ">
				<div class="w3-container">
					<div class="w3-container">
						<div class="w3-container w3-display-middle upload_box">
							<div class="w3-card w3-indigo" id="uploadCard">
								<div class="w3-containter w3-blue" id="uploadHeader">
									<h2 class="w3-xxlarge w3-center">Upload a file!</h2>
								</div>
								<div class="w3-container">
									<?php
										$target_dir = "uploads/";
										$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
										$fname = basename( $_FILES["fileToUpload"]["name"]);
										$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
										$uploadOk = 1;
										$fMaxSize = 5000000; // in bytes
										//$fIsImage = 0;
										$fSize = $_FILES["fileToUpload"]["size"];
										$fType = $imageFileType;
										//$fExists = 0;
										// Check if image file is a actual image or fake image
										if (isset($_POST["submit"])) {
											$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
											if ($check !== false) {
												//echo "File is an image - " . $check["mime"] . ".";
												//echo "</br>";
												$uploadOk = 1;
												$fIsImage = 1;
											} else {
												//echo "File is not an image.";
												$fIsImage = 0;
												$uploadOk = 0;
											}
										}
										// Check if file already exists
										if (file_exists($target_file)) {
											echo "Sorry, file already exists.";
											$fExists = 0;
											$uploadOk = 0;
										}
										// Check file size
										if ($_FILES["fileToUpload"]["size"] > $fMaxSize) {
											//echo "Sorry, your file is too large.";
											$uploadOk = 0;
											$fSizeOver = 1;
										}
										// Allow certain file formats
										if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
										&& $imageFileType != "gif" ) {
											echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
											$fType = $imageFileType;
											$uploadOk = 0;
										}
										if ($fIsImage == 0) {
											$fIsImage = 'No';
										}
										if ($fIsImage == 1) {
											$fIsImage = 'Yes';
										}
										if ($fExists == 0) {
											$fExists = 'No';
										}
										if ($fExists == 1) {
											$fExists = 'Yes';
										}
										
										// Check if $uploadOk is set to 0 by an error
										if ($uploadOk == 0) {
											echo "</br>";
											echo "Your file was not uploaded.";
											echo "</br></br>";
											echo "File Name: " .$fname;
											echo "</br>";
											echo "File is an Image: " .$fIsImage;
											echo "</br>";
											if ($fExists == 1) {
												echo "File Exists: " .$fExists;
												echo "</br>";
											}
											echo "File Size: " .$fSize ." Bytes";
											echo "</br>";
											echo "File Type: " .$fType;
											if ($fSizeOver == 1) {
												echo "File excedes the maximum file size of " .$fMaxSize ." with a file size of " .$fSize;
												echo "</br>";
											}
											// if everything is ok, try to upload file
										} else {
											if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
												echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
												echo "</br>";
												echo 'Direct Link: <a href="http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '">http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '</a>';
												echo "</br></br>";
												echo '<a href="http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '"><img class="uploaded_image" src="http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '"</img></a>';
												
												if ($_POST['email'] != null) {

													// Always set content-type when sending HTML email
													$headers = "MIME-Version: 1.0" . "\r\n";
													$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

													// More headers
													$headers .= 'From: <webmaster@example.com>' . "\r\n";
													$headers .= 'Cc: myboss@example.com' . "\r\n"
													;
													// the message
													$msg = 'Here is the file that you uploaded: <a href="http://' .$_SERVER['HTTP_HOST'] .'/' .$fName .'/">http://' .$_SERVER['HTTP_HOST'] .'/' .$fName .'</a>';

													// use wordwrap() if lines are longer than 70 characters
													$msg = wordwrap($msg,70);

													// send email
													mail($_POST['email'],"File: " .$fName, $msg, $headers, $target_file);
												}
												
												// Database stuff
												$servername = "mysql-stfh.alwaysdata.net";
												$username = "stfh_images";
												$password = "MqBcErKqnQCVxh4A";
												$dbname = "stfh_images";
												$tablename = "Files";

												// Create connection
												$conn = mysqli_connect($servername, $username, $password);

												// Check connection
												if (!$conn) {
													die("Connection failed: " . mysqli_connect_error());
												}
												if ($debug == true) {
													debug_to_console("Connected successfully");
												}

												// Create database
												$sql = "CREATE DATABASE " .$dbname ." IF NOT EXISTS";
												if (mysqli_query($conn, $sql)) {
													if ($debug == true) {
														debug_to_console("Database created successfully");
													}
												} else {
													if ($debug == true) {
														debug_to_console("Error creating database: " . mysqli_error($conn));
													}
												}

												$conn->close();

												// Create connection
												$conn = new mysqli($servername, $username, $password, $dbname);
												// Check connection
												if ($conn->connect_error) {
													die("Connection failed: " . $conn->connect_error);
												}

												// sql to create table
												$sql = "CREATE TABLE " .$tablename ."(
												fileID INT AUTO_INCREMENT,
												fileName VARCHAR(255) NOT NULL,
												fileType VARCHAR(255) NOT NULL,
												fileSize INT NOT NULL,
												fileUploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
												isDeleted ENUM('true', 'false') NOT NULL,
												PRIMARY KEY (fileId)
												);";

												if ($conn->query($sql) === TRUE) {
													if ($debug == true) {
														debug_to_console("Table " .$tablename ." created successfully");
													}
												} else {
													if ($debug == true) {
														debug_to_console("Error creating table: " . $conn->error);
													}
												}
												$conn->close();

												// Create connection
												$conn = new mysqli($servername, $username, $password, $dbname);
												// Check connection
												if ($conn->connect_error) {
													die("Connection failed: " . $conn->connect_error);
												}

												$sql = "INSERT INTO " .$tablename ." (fileName, fileType, fileSize, isDeleted)

												VALUES ('" .$fname ."','" .$fType ."','" .$fSize ."', 'false');";

												if ($conn->query($sql) === TRUE) {
													if ($debug == true) {
														debug_to_console("New record created successfully");
													}
												} else {
													if ($debug == true) {
														debug_to_console("Error: " . $sql . "<br>" . $conn->error);
													}
												}

												$conn->close();
												
											} else {
												echo "Sorry, there was an error uploading your file.";
											}
										}
									?>
									</br></br>
									<div class="w3-container w3-center">
										<button class="w3-button w3-blue" id="buttonBack" onclick="goBack()">Go Back</button>
									</div>
									</br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="w3-container">
			<?php include 'footer.php'; ?> <!-- Adds a footer -->
		</footer>
	</body>
</html>


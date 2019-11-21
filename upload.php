<!DOCTYPE html
<html>
	<head>
		<title>jtrent238 File Hosting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/upload.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
	</head>
	<body>
		<div class="w3-container-display">
			<img class="img_logo w3-padding-16 w3-margin w3-display-topmiddle" src="./assets/img/logo.png" alt="logo"/>
			</br></br>
			<div class="w3-container ">
				<div class="w3-container">
					<div class="w3-container">
						<div class="w3-container w3-display-middle upload_box">
							<div class="w3-card w3-indigo">
								<div class="w3-containter w3-blue">
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
												debug_to_console("Connected successfully");

												// Create database
												$sql = "CREATE DATABASE " .$dbname ." IF NOT EXISTS";
												if (mysqli_query($conn, $sql)) {
													debug_to_console("Database created successfully");
												} else {
													debug_to_console("Error creating database: " . mysqli_error($conn));
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
												PRIMARY KEY (fileId)
												);";

												if ($conn->query($sql) === TRUE) {
													debug_to_console("Table " .$tablename ." created successfully");
												} else {
													debug_to_console("Error creating table: " . $conn->error);
												}
												$conn->close();

												// Create connection
												$conn = new mysqli($servername, $username, $password, $dbname);
												// Check connection
												if ($conn->connect_error) {
													die("Connection failed: " . $conn->connect_error);
												}

												$sql = "INSERT INTO " .$tablename ." (fileName, fileType, fileSize)

												VALUES ('" .$fname ."','" .$fType ."','" .$fSize ."');";

												if ($conn->query($sql) === TRUE) {
													debug_to_console("New record created successfully");
												} else {
													debug_to_console("Error: " . $sql . "<br>" . $conn->error);
												}

												$conn->close();
												
											} else {
												echo "Sorry, there was an error uploading your file.";
											}
										}
										
										function debug_to_console($data)
										{
											$output = $data;
											if (is_array($output))
												$output = implode(',', $output);

											echo "<script>console.log(`Debug Objects: " . $output . " `);</script>";
										}
									?>
									</br></br>
									<div class="w3-container w3-center">
										<button class="w3-button w3-blue" onclick="goBack()">Go Back</button>
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
			<div class="w3-container">
				<div class="w3-container w3-display-bottommiddle w3-margintop">
					<p class="w3-text">
						Site made by
						<a href="https://github.com/jtrent238">jtrent238</a>
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>


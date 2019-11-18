<!DOCTYPE html
<html>
	<head>
		<title>jtrent238 File Hosting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
		
		<script>
		function goBack()
		{
			window.history.back();
		}
		</script>
	</head>
	<body>
		<img class="img_logo w3-padding-16 w3-margin w3-display-topmiddle" src="./assets/img/logo.png" alt="logo"/>
		</br></br>
		<div class="w3-container ">
			<div class="w3-container">
				<div class="w3-container">
					<div class="w3-container w3-display-middle">
						<div class="w3-card w3-indigo">
							<div class="w3-containter w3-blue">
								<h2 class="w3-xxlarge w3-center">Upload a file!</h2>
							</div>
							<div class="w3-container">
								<?php
								$target_dir = "uploads/";
								$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
								$uploadOk = 1;
								$fMaxSize = 5000000; // in bytes
								$fIsImage = 0;
								$fSize = 0;
								//$fType = 'null';
								$fExists = 0;
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								// Check if image file is a actual image or fake image
								if (isset($_POST["submit"])) {
									$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
									if ($check !== false) {
										echo "File is an image - " . $check["mime"] . ".";
										echo "</br>";
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
									$fSize = $_FILES["fileToUpload"]["size"];
									$uploadOk = 0;
								}
								// Allow certain file formats
								if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "gif" ) {
									//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
									echo "Sorry, your file was not uploaded.";
									echo "</br></br>";
									echo "File is an Image: " .$fIsImage;
									echo "</br>";
									echo "File Exists: " .$fExists;
									echo "</br>";
									echo "File Size: " .$fSize ." Bytes";
									echo "</br>";
									echo "File Type: " .$fType;
									echo "</br></br>";
									echo "File excedes the maximum file size of " .$fMaxSize ." with a file size of " .$fSize;
									// if everything is ok, try to upload file
								} else {
									if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
										echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
										echo "</br>";
										echo 'Direct Link: <a href="http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '">http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '</a>';
										echo "</br></br>";
										echo '<a href="http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '"><img src="http://'. $_SERVER['HTTP_HOST']. "/uploads/". basename( $_FILES["fileToUpload"]["name"]). '"</img></a>';
									} else {
										echo "Sorry, there was an error uploading your file.";
									}
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
		<footer>
			<div class="w3-container">
				<div class="w3-container w3-center w3-display-bottommiddle">
					<p class="w3-text">
						Site made by
						<a href="https://github.com/jtrent238">jtrent238</a>
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>


<!DOCTYPE html
<html>
	<head>
		<title>jtrent238 File Hosting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
	</head>
	<body>
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
								<form class="form_upload w3-form" name="form_upload" action="upload.php" method="post" enctype="multipart/form-data">
									<label>Select image to upload:</label>

									<input class="inputUpload w3-input w3-border" type="file" name="fileToUpload" id="fileToUpload">
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
										debug_to_console($sql);
										//debug_to_console("New record created successfully");
										
									} else {
										debug_to_console("Error: " . $sql . "<br>" . $conn->error);
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
										
									function debug_to_console($data)
									{
										$output = $data;
										if (is_array($output))
											$output = implode(',', $output);

										echo "<script>console.log(`Debug Objects: " . $output . " `);</script>";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</br>
		</br>
		<footer>
			<div class="w3-container">
				<div class="w3-container w3-display-bottommiddle">
					<p class="w3-text">
						Site made by
						<a href="https://github.com/jtrent238">jtrent238</a>
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>
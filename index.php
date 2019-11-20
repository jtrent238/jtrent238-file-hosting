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
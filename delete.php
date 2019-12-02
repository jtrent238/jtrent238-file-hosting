
<?php
	include 'debug.php';
	include 'config.php';
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		if ($debug == true) {
			die("Connection failed: " . $conn->connect_error);
		}
	}
	
	// Create database
	$sql = "UPDATE " .$tablename ." SET isDeleted='true' WHERE fileName='" .$_GET['file1'] ."';";
	
	if ($conn->query($sql) === TRUE) {
		if ($debug == true) {
			echo "Record updated successfully";
		}
	} else {
		if ($debug == true) {
			echo "Error updating record: " . $conn->error;
		}
	}

	$conn->close();
	
	unlink($_GET['file0']);
	
?>

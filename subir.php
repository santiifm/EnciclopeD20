<?php
include("db.php");
session_start();
if (isset($_POST['submit'])) { // if save button on the form is clicked
	// name of the uploaded file
	$filename = $_FILES['archivo']['name'];

	// destination of the file on the server
	$destination = 'subidas/' . $filename;

	// get the file extension
	$extension = pathinfo($filename, PATHINFO_EXTENSION);

	// the physical file on a temporary uploads directory on the server
	$file = $_FILES['archivo']['tmp_name'];
	$autor = $_SESSION['usuario'];
	
	if (!in_array($extension, ['pdf'])) {
		echo "You file extension must be .pdf";
	} elseif ($_FILES['archivo']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
		echo "File too large!";
	} else {
		// move the uploaded (temporary) file to the specified destination
		if (move_uploaded_file($file, $destination)) {
			$query = "INSERT INTO hojas (nombre_archivo, autor, fecha) VALUES ('$filename', '$autor', NOW())";
			if (mysqli_query($db, $query)) {
				echo "File uploaded successfully";
				header('location: index.php');
			}
		} else {
			echo "Failed to upload file.";
		}
	}
}
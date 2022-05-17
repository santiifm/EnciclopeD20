<?php
include("db.php");
session_start();
$fecha = new DateTime();
$str_fecha = $fecha->format('Y-m-d-H-i-s');
$allowed_img = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'jpg_large', 'bmp');

if (isset($_POST['submit'])) { // si se selecciona enviar en el formulario
	// nombre de los archivos subidos
	$archivo_pdf = $_FILES['pdf']['name'];
	$archivo_img = $_FILES['img']['name'];

	// conseguir la extensión del archivo
	$extension_pdf = pathinfo($archivo_pdf, PATHINFO_EXTENSION);
	$extension_img = pathinfo($archivo_img, PATHINFO_EXTENSION);
	
	$nombre_pdf = $str_fecha . "." . $extension_pdf;
	$nombre_img = $str_fecha . "." . $extension_img;
	
	// destino de los archivos en el servidor
	$destino_pdf = 'subidas/pdf/' . $nombre_pdf;
	$destino_img = 'subidas/img/' . $nombre_img;

	// el archivo físico en un lugar temporal de subidas
	$pdf = $_FILES['pdf']['tmp_name'];
	$img = $_FILES['img']['tmp_name'];
	$nombre = mysqli_real_escape_string($db, $_POST['nombre']);
	$autor = $_SESSION['usuario'];
	
	if (empty($nombre)) {
		$_SESSION['Error'] = "Tenés que ingresar un nombre";
		header('location: crear.php');
	} elseif (!in_array($extension_pdf, ['pdf'])){
		$_SESSION['Error'] = "El archivo ingresado no es un PDF.";
		header('location: crear.php');
	} elseif (!in_array($extension_img, $allowed_img)){
		$_SESSION['Error'] = "La imagen ingresada no es de un tipo permitido.";
		header('location: crear.php');
	} else {
		// mover los archivos temporales subidos a la carpeta deseada
		if (move_uploaded_file($pdf, $destino_pdf) && move_uploaded_file($img, $destino_img)) {
			$query = "INSERT INTO hojas (nombre_pj, pdf, img, autor, fecha) VALUES ('$nombre', '$nombre_pdf', '$nombre_img', '$autor', '$str_fecha')";
			if (mysqli_query($db, $query)) {
				$_SESSION['Error'] = "Tu personaje fue subido correctamente!";
				header('location: crear.php');
			}
		}
	}
}
?>
















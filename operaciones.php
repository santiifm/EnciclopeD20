<?php
include('db.php');
session_start();
$id="";
$pdf="";
$img="";

if (isset($_POST['btn_eliminar'])) {
	
	$id = mysqli_real_escape_string($db, $_POST['eliminar']);
	$pdf = mysqli_real_escape_string($db, $_POST['eliminar_pdf']);
	$img = mysqli_real_escape_string($db, $_POST['eliminar_img']);
	$query = "DELETE FROM hojas WHERE id = '$id'";
	if(mysqli_query($db, $query)){
		unlink($pdf);
		unlink($img);
		$_SESSION['aviso'] = "La operación fué realizada correctamente";
	}
	
	header('location: mis_creaciones.php');
}
?>
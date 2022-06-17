<?php
include('db.php');

if (isset($_GET ['id'])){
	$x = $_GET['id'];
}
$query = mysqli_query($db,"SELECT * FROM hojas WHERE id = '$x'");
			  
$res = mysqli_fetch_array($query);

$id = $res['id'];
$nombre = $res['nombre_pj'];
$pdf = $res['pdf'];
$pdf = 'subidas/pdf/' . $pdf;
$img = $res['img'];
$img = 'subidas/img/' . $img;
$autor = $res['autor'];
$fecha = $res['fecha'];
?>
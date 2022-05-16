<?php
include('db.php');
session_start();
$usuario="";
$contraseña="";
$errores = array();
$_SESSION['usuario']="";


if (isset($_POST['login'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);
	
	if (empty($usuario)) { $_SESSION['Error'] = "Se Requiere un Nombre de Usuario"; }
    if (empty($contraseña)) { $_SESSION['Error'] = "Se Requiere una Contraseña"; }
	
	if (!isset($_SESSION['Error'])) {
		$contraseña = md5($contraseña);
		
		$query="SELECT*FROM usuarios where usuario = '$usuario' and contraseña = '$contraseña'";
		$resultado=mysqli_query($db,$query);

		$filas=mysqli_num_rows($resultado);
		if (empty($filas)) { $_SESSION['Error'] = "El usuario y la contraseña no coinciden."; }
		
		if($filas){
			$_SESSION['usuario'] = $usuario;
			header("location:index.php");
		}else{
			include("login.php");
		}
	}else{
		include("login.php");
	}
}
if (isset($_POST['registro'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contraseña_1 = mysqli_real_escape_string($db, $_POST['contraseña_1']);
    $contraseña_2 = mysqli_real_escape_string($db, $_POST['contraseña_2']);
	
	if ($contraseña_1 != $contraseña_2) {$_SESSION['Error'] = "Las Contraseñas no Coinciden";}
	if (empty($usuario)) { $_SESSION['Error'] = "Se Requiere un Nombre de Usuario"; }
    if (empty($contraseña_1)) { $_SESSION['Error'] = "Se Requiere una Contraseña"; }
	
	if (!isset($_SESSION['Error'])) {
		$contraseña = md5($contraseña_1);
		
		$query = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')";
		mysqli_query($db, $query);

		$_SESSION['usuario'] = $usuario;
		header('location: index.php');
	}else{
		include("registro.php");
	}
}























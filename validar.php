<?php
include('db.php');
session_start();
$usuario="";
$contraseña="";
$errores = array();


if (isset($_POST['login'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);
	
	if (empty($usuario)) { $_SESSION['Error'] = "Se Requiere un Nombre de Usuario"; }
    if (empty($contraseña)) { $_SESSION['Error'] = "Se Requiere una Contraseña"; }
	
	if (!isset($_SESSION['Error'])) {
		$contraseña = md5($contraseña);
		
		$query="SELECT*FROM usuarios where usuario = '$usuario' and contraseña = '$contraseña'";
		$resultado=mysqli_query($db,$query);
		$query_tipo = mysqli_query($db, "SELECT tipo FROM usuarios where usuario = '$usuario' and contraseña = '$contraseña'");

		$filas=mysqli_num_rows($resultado);
		if (empty($filas)) { $_SESSION['Error'] = "El usuario y la contraseña no coinciden."; }
		
		if($filas){
			$res = mysqli_fetch_array($query_tipo);
			$usuario_tipo = $res['tipo'];
			$_SESSION['usuario'] = $usuario;
			$_SESSION['usuario_tipo'] = $usuario_tipo;
			header("location:index.php");
		}else{
			unset ($_SESSION['usuario']);
			include("login.php");
		}
	}else{
		unset ($_SESSION['usuario']);
		include("login.php");
	}
}
if (isset($_POST['registro'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contraseña_1 = mysqli_real_escape_string($db, $_POST['contraseña_1']);
    $contraseña_2 = mysqli_real_escape_string($db, $_POST['contraseña_2']);
	$query = mysqli_query($db, "SELECT usuario FROM usuarios WHERE usuario = '$usuario'");
	
	if ($contraseña_1 != $contraseña_2) {$_SESSION['Error'] = "Las Contraseñas no Coinciden";}
	if (empty($usuario)) { $_SESSION['Error'] = "Se Requiere un Nombre de Usuario"; }
    if (empty($contraseña_1)) { $_SESSION['Error'] = "Se Requiere una Contraseña"; }
    if (isset($contraseña_1) && empty($contraseña_2)) { $_SESSION['Error'] = "Se Requiere que Confirme su Contraseña"; }
	
	if (mysqli_num_rows($query) == 0){
		if (!isset($_SESSION['Error'])) {
			$contraseña = md5($contraseña_1);
			
			$query = "INSERT INTO usuarios (usuario, contraseña, tipo) VALUES ('$usuario', '$contraseña', user)";
			mysqli_query($db, $query);
			
			unset ($_SESSION['usuario']);
			header('location: login.php');
		}else{
			unset ($_SESSION['usuario']);
			include("registro.php");
		}
	}else {
		$_SESSION['Error'] = "Ese nombre de usuario ya está registrado. Intentá con otro.";
		include("registro.php");
	}
}
if (isset($_POST['cambiar_perfil'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
	$usuario_activo = $_SESSION['usuario'];
    $contraseña_1 = mysqli_real_escape_string($db, $_POST['contraseña_1']);
    $contraseña_2 = mysqli_real_escape_string($db, $_POST['contraseña_2']);
	$query_id = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario = '$usuario_activo'");
	$id = mysqli_fetch_array($query_id);
	$nombre = $id['usuario'];
	
	
	if (empty($usuario)) { $usuario = $_SESSION['usuario']; }
	if (isset($contraseña_1) && isset($contraseña_2) && $contraseña_1 != $contraseña_2) {$_SESSION['Error'] = "Las Contraseñas no Coinciden";}
    if (isset($contraseña_1) && empty($contraseña_2)) { $_SESSION['Error'] = "Se Requiere que Confirme su Contraseña"; }
	
	
	if (!isset($_SESSION['Error'])) {
		if ($usuario != $_SESSION['usuario'] && isset($contraseña_1)) {
			$contraseña = md5($contraseña_1);
			
			$query = "UPDATE `usuarios` SET `usuario` = '$usuario', `contraseña` = '$contraseña' WHERE `usuario` = '$nombre'";
			mysqli_query($db, $query);
			$query = "UPDATE `hojas` SET `autor` = '$usuario' WHERE `autor` = '$nombre'";
			mysqli_query($db, $query);
			
			unset ($_SESSION['usuario']);
			header('location: login.php');
			
		}	else if ($usuario == $_SESSION['usuario'] && isset($contraseña_1)) {
			$contraseña = md5($contraseña_1);
			
			$query = "UPDATE `usuarios` SET `contraseña` = '$contraseña' WHERE `usuario` = '$nombre'";
			mysqli_query($db, $query);
			
			unset ($_SESSION['usuario']);
			header('location: login.php');
			
			}	else if ($usuario != $_SESSION['usuario'] && !isset($contraseña_1)) {
				
				$query = "UPDATE `usuarios` SET `usuario` = '$usuario' WHERE `usuario` = '$nombre'";
				mysqli_query($db, $query);
				$query = "UPDATE `hojas` SET `autor` = '$usuario' WHERE `autor` = '$nombre'";
				mysqli_query($db, $query);
				
				unset ($_SESSION['usuario']);
				header('location: login.php');
				
				}	else{
					include("perfil.php");
					}
		}else{
			include("perfil.php");
		}
}























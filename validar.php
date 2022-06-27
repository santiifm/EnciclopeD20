<?php
include('db.php');
session_start();
$usuario="";
$contraseña="";
$id="";
$pdf="";
$img="";
$fecha = new DateTime();
$str_fecha = $fecha->format('Y-m-d-H-i-s');
$allowed_img = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'jpg_large', 'bmp');

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
			header("location:index");
		}else{
			unset ($_SESSION['usuario']);
			include("login");
		}
	}else{
		unset ($_SESSION['usuario']);
		include("login");
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
			
			$query = "INSERT INTO usuarios (usuario, contraseña, tipo) VALUES ('$usuario', '$contraseña', 'user')";
			mysqli_query($db, $query);
			
			unset ($_SESSION['usuario']);
			header('location: login');
		}else{
			unset ($_SESSION['usuario']);
			include("registro");
		}
	}else {
		$_SESSION['Error'] = "Ese nombre de usuario ya está registrado. Intentá con otro.";
		include("registro");
	}
}

if (isset($_POST['submit'])) { 
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
		header('location: crear');
	} elseif (empty($pdf)) {
		$_SESSION['Error'] = "Tenés que ingresar un PDF";
		header('location: crear');
	} elseif (empty($img)) {
		$_SESSION['Error'] = "Tenés que ingresar una imagen";
		header('location: crear');
	} elseif (!in_array($extension_pdf, ['pdf'])){
		$_SESSION['Error'] = "El archivo ingresado no es un PDF.";
		header('location: crear');
	} elseif (!in_array($extension_img, $allowed_img)){
		$_SESSION['Error'] = "La imagen ingresada no es de un tipo permitido.";
		header('location: crear');
	} else {
		// mover los archivos temporales subidos a la carpeta deseada
		if (move_uploaded_file($pdf, $destino_pdf) && move_uploaded_file($img, $destino_img)) {
			$query = "INSERT INTO hojas (nombre_pj, pdf, img, autor, fecha) VALUES ('$nombre', '$nombre_pdf', '$nombre_img', '$autor', '$str_fecha')";
			if (mysqli_query($db, $query)) {
				$_SESSION['Error'] = "Tu personaje fue subido correctamente!";
				header('location: crear');
			}
		}
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
			header('location: login');
			
		}	else if ($usuario == $_SESSION['usuario'] && isset($contraseña_1)) {
			$contraseña = md5($contraseña_1);
			
			$query = "UPDATE `usuarios` SET `contraseña` = '$contraseña' WHERE `usuario` = '$nombre'";
			mysqli_query($db, $query);
			
			unset ($_SESSION['usuario']);
			header('location: login');
			
			}	else if ($usuario != $_SESSION['usuario'] && !isset($contraseña_1)) {
				
				$query = "UPDATE `usuarios` SET `usuario` = '$usuario' WHERE `usuario` = '$nombre'";
				mysqli_query($db, $query);
				$query = "UPDATE `hojas` SET `autor` = '$usuario' WHERE `autor` = '$nombre'";
				mysqli_query($db, $query);
				
				unset ($_SESSION['usuario']);
				header('location: login');
				
				}	else{
					include("perfil");
					}
		}else{
			include("perfil");
		}
}

if (isset($_POST['btn_eliminar'])) {
	
	$id = mysqli_real_escape_string($db, $_POST['id']);
	$pdf = mysqli_real_escape_string($db, $_POST['pdf']);
	$img = mysqli_real_escape_string($db, $_POST['img']);
	$query = "DELETE FROM hojas WHERE id = '$id'";
	if(mysqli_query($db, $query)){
		unlink($pdf);
		unlink($img);
		$_SESSION['aviso'] = "La operación fué realizada correctamente";
	}
	
	header('location: creaciones');
}	

if (isset($_POST['cambiar_pj'])) {
	
	$nombre = mysqli_real_escape_string($db, $_POST['nombre']);
	$id = mysqli_real_escape_string($db, $_POST['id']);
	$archivo_pdf = $_FILES['pdf']['name'];
	$archivo_img = $_FILES['img']['name'];


	$extension_pdf = pathinfo($archivo_pdf, PATHINFO_EXTENSION);
	$extension_img = pathinfo($archivo_img, PATHINFO_EXTENSION);
	
	$nombre_pdf = $str_fecha . "." . $extension_pdf;
	$nombre_img = $str_fecha . "." . $extension_img;
	
	
	$destino_pdf = 'subidas/pdf/' . $nombre_pdf;
	$destino_img = 'subidas/img/' . $nombre_img;


	$pdf = $_FILES['pdf']['tmp_name'];
	$img = $_FILES['img']['tmp_name'];
	
	if (!empty($pdf) && !in_array($extension_pdf, ['pdf'])){
		$_SESSION['Error'] = "El archivo ingresado no es un PDF.";
		header('location: modificar?id='.$id.'');
	} elseif (!empty($img) && !in_array($extension_img, $allowed_img)){
		$_SESSION['Error'] = "La imagen ingresada no es de un tipo permitido.";
		header('location: modificar?id='.$id.'');
	}
	
	if (!isset($_SESSION['Error'])){
		if (!empty($nombre)){			
		$query = "UPDATE `hojas` SET `nombre_pj` = '$nombre' WHERE `id` = '$id'";
		mysqli_query($db, $query);
		
		}	
		if (!empty($pdf)){
		move_uploaded_file($pdf, $destino_pdf);
		$query = "UPDATE `hojas` SET `pdf` = '$nombre_pdf' WHERE `id` = '$id'";
		mysqli_query($db, $query);
			
		}	
		if (!empty($img)){
		move_uploaded_file($img, $destino_img);
		$query = "UPDATE `hojas` SET `img` = '$nombre_img' WHERE `id` = '$id'";
		mysqli_query($db, $query);
			
		}
		
		header('location: personaje?id='.$id.'');
		
	}	else{
		
		header('location: modificar?id='.$id.'');
	
	}
}





















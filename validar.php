<?php
include('db.php');
session_start();
$usuario="";
$contraseña="";
$errores = array();
$_SESSION['usuario']="";


$db=mysqli_connect("localhost","root","Maristarugby","login");

if (isset($_POST['login'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);
	
	$contraseña = md5($contraseña);
	
	$query="SELECT*FROM usuarios where usuario = '$usuario' and contraseña = '$contraseña'";
	$resultado=mysqli_query($db,$query);

	$filas=mysqli_num_rows($resultado);

	if($filas){
		$_SESSION['usuario'] = $usuario;
		header("location:index.php");
	}else{
		include("login.php");
		?>
		<h4>El Nombre de Usuario o la Contraseña no Fueron Ingresados Correctamente</h4>
		<?php
	}
	mysqli_free_result($resultado);
}
if (isset($_POST['registro'])) {
	
	$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contraseña_1 = mysqli_real_escape_string($db, $_POST['contraseña_1']);
    $contraseña_2 = mysqli_real_escape_string($db, $_POST['contraseña_2']);
	
	if (empty($usuario)) { array_push($errores, "Se Requiere un Nombre de Usuario"); }
    if (empty($contraseña_1)) { array_push($errores, "Se Requiere una COntraseña"); }
  
    if ($contraseña_1 != $contraseña_2) {
        array_push($errores, "Las Contraseñas no Coinciden");
    }
	
	if (count($errores) == 0) {
		$contraseña = md5($contraseña_1);
		
		$query="INSERT INTO usuarios (usuario, contraseña) VALUES('$usuario', '$contraseña')";
		mysqli_query($db, $query);

		$_SESSION['usuario'] = $usuario;
		header('location: index.php');
	}else{
		include("registro.php");
		?>
		<h4>Se requiere rellenar todos los campos correctamente</h4>
		<?php
	}
}
mysqli_close($conexion);








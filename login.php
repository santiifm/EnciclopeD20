<?php
@session_start();
include("db.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!--Icono de Cabecera-->
	<link rel="icon" href="./favicon.ico">

    <title>Iniciar Sesión</title>
	
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>

	<?php include("navbar.php"); ?>
	
	<div class="container-sm"  style="padding-top: 100px">
	</div>
	<div class="container-sm bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px">
		<div class="justify-content-center">
			<form action="validar.php" method="post">
				<p style="color: #e41900">
					<?php
					if( isset($_SESSION['Error']) ){
					echo $_SESSION['Error'];
					unset($_SESSION['Error']);}
					?>
				</p>
				<div class="form-group">
					<label style="font-size: 20px">Nombre de Usuario</label>
					<input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" name="usuario">
				</div>
				<div class="form-group">
					<label style="font-size: 20px">Contraseña</label>
					<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña">
				</div>
					<button type="submit" class="btn boton-email" name="login">Iniciar Sesión</button>
				<p>
					No estas registrado?
					<a class="btn boton-email" href="registro.php">
					Registrate!
					</a>
				</p>
			</form>	
		</div>	
	</div>	
	<div class="container-sm"  style="padding-bottom: 200px">
	</div>
  </body>
  <?php include("footer.php"); ?>
</html>





















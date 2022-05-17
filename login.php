<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
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





















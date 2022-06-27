<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <body>

	<?php include("navbar.php"); ?>
	
	<div class="container-sm"  style="padding-top: 100px">
	</div>
	<div class="container-sm bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px; width: 30em;">
		<div class="justify-content-center">
			<form action="validar" method="post">
				<p style="color: #e41900">
					<?php
					if( isset($_SESSION['Error']) ){
						echo $_SESSION['Error'];
						unset($_SESSION['Error']);
					}
					?>
				</p>
			  <div class="form-group">
				<label style="font-size: 20px">Cambiar Nombre de Usuario</label>
				<input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" name="usuario">
			  </div>
			  <div class="form-group">
				<label style="font-size: 20px">Nueva Contraseña</label>
				<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña_1">
			  </div>
			  <div class="form-group">
				<label style="font-size: 20px">Repita su Nueva Contraseña</label>
				<input type="password" class="form-control" placeholder="Confirme su Contraseña" name="contraseña_2">
			  </div>
			  <button type="submit" class="btn boton-email mt-3" name="cambiar_perfil">Cambiar</button>
			</form>
		</div>	
	</div>	
	<div class="container-sm"  style="padding-bottom: 200px">
	</div>
  </body>
  <?php include("footer.php"); ?>
</html>
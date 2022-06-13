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
						unset($_SESSION['Error']);
					}
					?>
				</p>
			  <div class="form-group">
				<label style="font-size: 20px">Nuevo Nombre de Usuario</label>
				<input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" name="usuario">
			  </div>
			  <button type="submit" class="btn boton-email" name="cambiar_perfil">Cambiar Nombre de Usuario</button>
			  <div class="form-group mt-4">
				<label style="font-size: 20px">Ingrese su Nueva Contraseña</label>
				<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña_1">
				<label style="font-size: 20px">Repita su Nueva Contraseña</label>
				<input type="password" class="form-control" placeholder="Confirme su Contraseña" name="contraseña_2">
			   </div>
			  </div>
			  <button type="submit" class="btn boton-email mb-3" name="cambiar_perfil">Cambiar Contraseña</button>
			</form>
		</div>	
	</div>	
	<div class="container-sm"  style="padding-bottom: 200px">
	</div>
  </body>
  <?php include("footer.php"); ?>
</html>
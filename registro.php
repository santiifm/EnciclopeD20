<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<body>

		<?php include("navbar.php"); ?>
		
		</div>	
		<div class="container-sm"  style="padding-top: 50px">
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
					<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña_1">
				  </div>
				  <div class="form-group">
					<label style="font-size: 20px">Repita su Contraseña</label>
					<input type="password" class="form-control" placeholder="Confirme su Contraseña" name="contraseña_2">
				  </div>
				  <button type="submit" class="btn boton-email" name="registro">Registrarse</button>
				</form>
				<p>
					Ya tienes una cuenta?
					<a class="btn boton-email" href="login.php">
						Ingresá Acá!
					</a>
				</p>
			</div>
		</div>
		</div>	
		<div class="container-sm"  style="padding-bottom: 200px">
		</div>
	</body>
	<?php include("footer.php"); ?>
</html>
<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
	
	<?php include("navbar.php"); ?>
	
	<body>
	
	<script src="./js/validarregistro.js"></script>
	
		</div>	
		<div class="container-sm"  style="padding-top: 50px">
		</div>
		<div class="container-sm bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px; width: 30em;">
			<div class="justify-content-center">
				<form id="formRegistro" action="validar" onsubmit="return validarForm()" method="post">
					<p style="color: #e41900">
						<?php
						if( isset($_SESSION['Error']) ){
						echo $_SESSION['Error'];
						unset($_SESSION['Error']);}
						?>
					</p>
				  <div class="form-group mt-2">
					<label style="font-size: 20px">Nombre de Usuario</label>
					<input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" name="usuario">
				  </div>
				  <div class="form-group mt-2">
					<label style="font-size: 20px">Contraseña</label>
					<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña_1">
				  </div>
				  <div class="form-group mt-2">
					<label style="font-size: 20px">Repita su Contraseña</label>
					<input type="password" class="form-control" placeholder="Confirme su Contraseña" name="contraseña_2">
				  </div>
				  <button type="submit" class="btn boton-email mt-3" name="registro">Registrarse</button>
				  <div class="mt-2 mb-2">
					<p style="font-size: 25px">
						Ya tenés una cuenta?
						<a class="btn boton-email" href="login">
							Ingresá Acá!
						</a>
					</p>
				  </div>
				</form>
			</div>
		</div>
		</div>	
		<div class="container-sm"  style="padding-bottom: 200px">
		</div>
	</body>
	<?php include("footer.php"); ?>
</html>
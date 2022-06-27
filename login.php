<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">

	<?php include("navbar.php"); ?>
	
  <body>
	
	<script src="./js/validarlogin.js"></script>
	
	<div class="container-sm"  style="padding-top: 100px">
	</div>
	<div class="container-lg bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px; width: 30em;">
		<div class="justify-content-center">
			<form id="formLogin" action="validar" onsubmit="return validarForm()" method="post" required>
				<p style="color: #e41900">
					<?php
					if( isset($_SESSION['Error']) ){
					echo $_SESSION['Error'];
					unset($_SESSION['Error']);}
					?>
				</p>
				<div class="form-field mt-2">
					<label style="font-size: 20px">Nombre de Usuario</label>
					<input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" name="usuario">
				</div>
				<div class="form-field mt-2">
					<label style="font-size: 20px">Contraseña</label>
					<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña">
				</div>
				<button type="submit" class="btn boton-email mt-3" name="login">Iniciar Sesión</button>
				<div class="mt-2 mb-2">
					<p style="font-size: 25px">
						No estas registrado?
						<a class="btn boton-email" href="registro">
							Registrate!
						</a>
					</p>
				</div>
			</form>	
		</div>	
	</div>	
	<div class="container-sm"  style="padding-bottom: 200px">
	</div>
  </body>
  <?php include("footer.php"); ?>
</html>





















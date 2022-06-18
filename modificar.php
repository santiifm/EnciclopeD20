<?php
@session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="es">
  <body>

	<?php 
	include("navbar.php");
	include ("get_pj.php");
	
	if ($autor == $_SESSION['usuario'] or $_SESSION['usuario_tipo'] == "admin" ){
	?>
		<div class="container-sm"  style="padding-top: 100px">
		</div>
		<div class="container-sm bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px">
			<div class="row">
				<div class="col-md-6 col-sm-12 text-center">
					<h1 style="display: inline-block">Modificando a: </h1>
					<h1 class="text-break" style="color: #e41900; display:inline-block"> <?=$nombre?><h1>
					<img  class="shadow-lg rounded pt-2" src="<?= $img?>" alt="img_pj" style="width:50%; height:auto;">
				</div>
				<div class="col-md-6 col-sm-12">
					<form action="validar.php" method="post" enctype="multipart/form-data">
						<p style="color: #e41900">
							<?php
							if( isset($_SESSION['Error']) ){
								echo $_SESSION['Error'];
								unset($_SESSION['Error']);
							}
							?>
						</p>
						<label class="mt-2 mb-2" style="font-size: 20px">Cambiar Nombre de Personaje</label>
						<input type="text" class="form-control" placeholder="Ingrese el Nombre del Personaje" name="nombre">
						<label class="mt-2 mb-2" style="font-size: 20px">Cambiar Retrato</label>
						<input type="file"  name="img" class="form-control form-control-lg" id="formFile" style="font-size: 25px">
						<label class="mt-2 mb-2" style="font-size: 20px">Cambiar Hoja de Personaje</label>
						<input type="file"  name="pdf" class="form-control form-control-lg" id="formFile" style="font-size: 25px">
						<input type='hidden' name="id" value="<?php echo $id; ?>" />
						<input type="submit" class="btn boton-email mt-3" name="cambiar_pj" value="Cambiar">
					</form>
				</div>
			</div>	
		</div>
	<?php
	}
	?>
  </body>
  <?php include("footer.php"); ?>
</html>














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
	?>
	<section class="section_pj">
		<div class="container-fluid mt-5 pe-5">
			<div class="row justify-content-between text-center mx-auto">
				<div class="col-md-6 col-sm-12 my-auto">
					<h1 class="text-break" style="color: #e41900; font-size: 80px;"><?=$nombre?><h1>
					<h4>Creado por: <?=$autor?></h4>
					<?php
					if ($_SESSION['usuario_tipo'] == "admin" or $autor == $_SESSION['usuario']) {
					  ?>
						  <a class="btn boton-email mt-2" href="./modificar.php?id=<?=$id?>" name="btn_modificar">Modificar</a>
						  <form class="form-inline" action="validar.php" method="post">
							<input type='hidden' name="id" value="<?php echo $id; ?>" />
							<input type='hidden' name="img" value="<?php echo $pdf; ?>" />
							<input type='hidden' name="pdf" value="<?php echo $img; ?>" />
							<button type="submit" class="btn boton-email mt-2" name="btn_eliminar">Eliminar</button>
						  </form>
						  </br>
					<?php 
					}
					?>
					<img  class="pt-2" src="<?= $img?>" alt="img_pj" style="width:50%; height:auto;">
				</div>
				<div class="col-md-6 col-sm-12 pt-5">
					<div class="ratio" style="--bs-aspect-ratio: 100%">
					  <iframe src="<?= $pdf?>" title="Hoja de Personaje" style="padding-bottom: 50px"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="container shadow-lg mt-5 mb-5">
			<div class="col-md-6 col-sm-12">
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
	?>
	
  </body>
</html>
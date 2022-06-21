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
		<div class="container mt-5 pe-5 bg-dark" style="max-width: 90%;">
			<div class="row justify-content-center text-center mx-auto">
				<div class="col-lg-6 col-md-12 mb-5 mt-3">
					<h1 class="text-break pt-3" style="color: #e41900; font-size: 70px;"><?=$nombre?><h1>
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
					<img  class="shadow-lg rounded mt-3" src="<?= $img?>" alt="img_pj" style="width:70%; height:auto;">
				</div>
				<div class="col-lg-6 col-md-12 pt-5">
					<div class="ratio rounded" style="--bs-aspect-ratio: 140%">
					  <iframe src="<?= $pdf?>" title="Hoja de Personaje" style="height: 100%; width: 100%;padding-bottom: 50px"></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
	?>
  </body>
</html>
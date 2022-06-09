<?php
@session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="es">
  <?php include("navbar.php"); ?>
	
  <body>
	
	<?php
	if (!isset ($_GET['pagina']) ) {  
		$pagina = 1;  
	} else {  
		$pagina = $_GET['pagina'];
	}
	
	include("buscar.php");
	
	?>
	
	<section>
		<div class="container-lg" style="padding-top: 25px">
			<?php for($y=1; $y<=2; $y++) {?>
				<div class="pt-5">
				<div class="row">
				  <?php
					for($x = $resultados; $x < $resultados + 4; $x++) {
					  if(isset($x) and $x<$total_resultados) {
						$query = mysqli_query($db,"SELECT * FROM hojas WHERE id = '$arreglo_res[$x]'");
						  
						$res = mysqli_fetch_array($query);
		   
						$nombre = $res['nombre_pj'];
						$pdf = $res['pdf'];
						$pdf = 'subidas/pdf/' . $pdf;
						$img = $res['img'];
						$img = 'subidas/img/' . $img;
						$autor = $res['autor'];
						$fecha = $res['fecha'];
				  ?>
					  <div class="col-md-3 col-sm-6 mx-auto">
						  <div class="card bg-dark rounded" style="width: 105%; text-align: center;">
							<img class="card-img-top" src="<?php echo $img; ?>" alt="Card image cap">
							<div class="card-body">
							  <h1> <?php echo "<a class='btn_nombre' href='resultado_busqueda.php?entrada={$nombre}{$autor}' style='font-size: 40px'>{$nombre}</a>";?> </h1>
							  <?php echo "<p>Creado por: {$autor}</p>";?>
							  <a href="<?= $pdf ?>" class="btn boton-email" target="_blank">Ver Hoja del Personaje</a>
							  <h2 class="card-subtitle mt-2 text-muted">
							  <?php echo "<p>Subido el: {$fecha}</p>";?>
							  </h2>
							</div>
						  </div>
					  </div>
				<?php
					  }
					}
				
				$resultados = $resultados + 4;
			}
				?>
				</div>
				</div>
		</div>
		<div class="container-sm bg-dark roundedshadow-lg p-3 mt-5 mb-5" style="padding-bottom: 50px; width: 50%">
			<div class="col justify-content-center">
				<?php
				for($pagina = 1; $pagina <= $numero_paginas; $pagina++) {  
					echo '<a class="btn boton-email mx-2" href = "resultado_busqueda.php?pagina=' . $pagina . '">Pág.' . $pagina .' </a>';
				}
				?>
			</div>
		</div>
	</section>
    <?php include("footer.php"); ?>
  </body>
</html>
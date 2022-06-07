<?php
@session_start();
include("db.php");
error_reporting(E_ERROR | E_PARSE);
?> 
<!DOCTYPE html>
<html lang="es">
  <?php include("navbar.php"); ?>
  
  <body>
	
	<?php
	
	include('buscar_id.php');
	
	if (!isset ($_GET['pagina']) ) {  
		$pagina = 1;  
	} else {  
		$pagina = $_GET['pagina'];
	}
	
	$resultados_por_fila = 4;
	$resultados_por_pagina = 8;
	$resultados = ($pagina - 1) * ($resultados_por_pagina);
	
	$query = mysqli_query($db,"SELECT id FROM hojas");
	$total_resultados = mysqli_num_rows($query);
	$numero_paginas = ceil ($total_resultados / $resultados_por_pagina);
	?>
	<section>
		<div class="container-lg" style="padding-top: 50px">
			<?php for($y=1; $y<=2; $y++) {?>
				<div class="pt-5">
				<div class="row">
				  <?php
					$x=0;
					for($x = $resultados; $x < $resultados + 4; $x++) {
					  if(isset($x) and $x<$total_resultados) {
						$query = mysqli_query($db,"SELECT * FROM hojas WHERE id = '$idarray[$x]'");
						  
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
							  <h1 style="color: #e41900"> <?php echo "<p style='font-size: 40px'>{$nombre}</p>";?> </h1>
							  <?php echo "<p>creado por {$autor}</p>";?>
							  <a href="<?= $pdf ?>" class="btn boton-redes boton-descarga" target="_blank"></a>
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
					echo '<a class="btn boton-email mx-2" href = "ultimo.php?pagina=' . $pagina . '">Pág.' . $pagina .' </a>';  
				}
				?>
			</div>
		</div>
	</section>
    <?php include("footer.php"); ?>
  </body>
</html>
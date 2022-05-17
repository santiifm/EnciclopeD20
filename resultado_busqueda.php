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
	if (!isset ($_GET['pagina']) ) {  
		$pagina = 1;  
	} else {  
		$pagina = $_GET['pagina'];
	}
	
	include("buscar.php");
	
	$resultados_por_fila = 4;
	$resultados_por_pagina = 8;
	$primer_resultado = ($pagina - 1) * ($resultados_por_pagina);
	$segundo_resultado = $primer_resultado + 4;
	
	$query = mysqli_query($db,"SELECT id FROM hojas WHERE MATCH(nombre_pj,autor) AGAINST ('%" . $entrada . "%')");
	$total_resultados = mysqli_num_rows($query);
	$numero_paginas = ceil ($total_resultados / $resultados_por_pagina);
	
	?>
	
	<div class="container-lg" style="padding-top: 50px">
		<div class="row">
		  <?php
			for($x = $primer_resultado; $x < $primer_resultado + 4; $x++) {
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
		   ?>
		</div>
	</div>
	<div class="container-xl pt-5" style="padding-bottom: 50px">
		<div class="row">
			<?php
			for($x = $segundo_resultado; $x < $segundo_resultado + 4; $x++) {
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
				  <div class="card bg-dark border-0" style="width: 105%; text-align: center;">
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
			?>
		</div>
	</div>
	<div class="container-sm bg-dark roundedshadow-lg p-3" style="padding-bottom: 50px; width: 50%">
		<div class="col justify-content-center">
			<?php
			for($pagina = 1; $pagina <= $numero_paginas; $pagina++) {  
				echo '<a class="btn boton-email mx-2" href = "resultado_busqueda.php?pagina=' . $pagina . '">Pág.' . $pagina .' </a>';  
			}
			?>
		</div>
	</div>
  </body>
  <?php include("footer.php"); ?>
</html>
<?php
@session_start();
include("db.php");
error_reporting(E_ERROR | E_PARSE);
?> 
<!DOCTYPE html>
<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!--Icono de Cabecera-->
	<link rel="icon" href="./favicon.ico">

    <title>Últimas Creaciones</title>
	
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./styles.css">
  </head>
  
  <?php include("navbar.php"); ?>
  
  <body>
	
	<?php
	if (!isset ($_GET['pagina']) ) {  
		$pagina = 1;  
	} else {  
		$pagina = $_GET['pagina'];
	}
	
	$resultados_por_fila = 4;
	$resultados_por_pagina = 8;
	$primer_resultado = ($pagina - 1) * $resultados_por_fila;
	$segundo_resultado = ($pagina - 1) * ($resultados_por_fila) + 4;
	
	$query = mysqli_query($db,"SELECT id FROM hojas");
	$total_resultados = mysqli_num_rows($query);
	$numero_paginas = ceil ($total_resultados / $resultados_por_pagina);
	?>
	
	<div class="container-fluid"><div class="main-carousel p-2" id="latestCarousel">
		<div class="row">
  
		  <?php
			include('buscar_id.php');
			for($x = $primer_resultado; $x < $primer_resultado + 4; $x++) {	  
			  if(isset($x)) {
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
						<div class="carousel-cell p-2">
						  <div class="card bg-dark border-0" style="width: 400px; text-align: center;">
							<img class="card-img-top" src=
							  "<?php echo $img; ?>" alt="Card image cap">
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
					</div>
			<?php
			  }
			}
			?>
		</div>
	  </div>
	</div>

	<div class="container-fluid"><div class="main-carousel p-2" id="latestCarousel">
		<div class="row">
  
		  <?php 
			include('buscar_id.php');
			for($x = $segundo_resultado; $x < $segundo_resultado + 4; $x++) {
			  if(isset($x)) {
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
				<div class="carousel-cell p-2">
				  <div class="card bg-dark border-0" style="width: 400px; text-align: center;">
					<img class="card-img-top" src=
					  "<?php echo $img; ?>" alt="Card image cap">
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
			  </div>
			<?php
			  }
			}
			?>
		</div>
	  </div>
	</div>
	<?php
	for($pagina = 1; $pagina <= $numero_paginas; $pagina++) {  
        echo '<a href = "ulitmo.php?page=' . $pagina . '">' . $pagina . ' </a>';  
    }
	?>	
  </body>
  <?php include("footer.php"); ?>
</html>
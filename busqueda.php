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
	
	include("buscar_busqueda.php");
	
	?>
	
	<section>
		<div class="container-sm" style="padding-top: 50px">
			<div class="dropdown">
			  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Ordenar
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="creaciones.php?pagina=<?php echo $pagina;?>&orden=fecha ASC">Fecha&#129045</a>
				<a class="dropdown-item" href="creaciones.php?pagina=<?php echo $pagina;?>&orden=fecha DESC">Fecha&#129047</a>
				<a class="dropdown-item" href="creaciones.php?pagina=<?php echo $pagina;?>&orden=autor ASC">Autor&#129045</a>
				<a class="dropdown-item" href="creaciones.php?pagina=<?php echo $pagina;?>&orden=autor DESC">Autor&#129047</a>
				<a class="dropdown-item" href="creaciones.php?pagina=<?php echo $pagina;?>&orden=nombre_pj ASC">Nombre Personaje&#129045</a>
				<a class="dropdown-item" href="creaciones.php?pagina=<?php echo $pagina;?>&orden=nombre_pj DESC">Nombre Personaje&#129047</a>
			  </div>
			</div>
		</div>
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
							  <a href="<?= $pdf ?>" class="btn boton-email" target="_blank" rel="noopener">Ver Hoja del Personaje</a>
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
		<?php include ("paginacion.php");?>
	</section>
    <?php include("footer.php"); ?>
  </body>
</html>
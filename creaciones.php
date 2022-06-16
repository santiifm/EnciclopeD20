<?php
@session_start();
include("db.php");
?> 
<!DOCTYPE html>
<html lang="es">
  <?php include("navbar.php"); ?>
  
  <body>
	
	<?php
	
	include('buscar_creaciones.php');

	?>
	<section>
		<div class="container-sm" style="padding-top: 50px">
			<div class="dropdown">
			  <a class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Ordenar</a>
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
			<?php include ('card_pj.php');?>
		</div>
		<?php include ("paginacion.php");?>
	</section>
    <?php include("footer.php"); ?>
  </body>
</html>
<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <?php include("navbar.php"); ?>
	
  <body>
	
	<?php
	
	include("buscar_busqueda.php");
	
	?>
	
	<section>
		<div class="container-sm" style="padding-top: 50px">
			<div class="dropdown">
			  <a class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Ordenar</a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="busqueda?pagina=<?php echo $pagina;?>&orden=fecha ASC&entrada=<?php echo $entrada?>">Fecha&#129045</a>
				<a class="dropdown-item" href="busqueda?pagina=<?php echo $pagina;?>&orden=fecha DESC&entrada=<?php echo $entrada?>">Fecha&#129047</a>
				<a class="dropdown-item" href="busqueda?pagina=<?php echo $pagina;?>&orden=autor ASC&entrada=<?php echo $entrada?>">Autor&#129045</a>
				<a class="dropdown-item" href="busqueda?pagina=<?php echo $pagina;?>&orden=autor DESC&entrada=<?php echo $entrada?>">Autor&#129047</a>
				<a class="dropdown-item" href="busqueda?pagina=<?php echo $pagina;?>&orden=nombre_pj ASC&entrada=<?php echo $entrada?>">Nombre Personaje&#129045</a>
				<a class="dropdown-item" href="busqueda?pagina=<?php echo $pagina;?>&orden=nombre_pj DESC&entrada=<?php echo $entrada?>">Nombre Personaje&#129047</a>
			  </div>
			</div>
		</div>
		<div class="container-lg">
			<?php include ('card_pj.php');?>
		</div>
		<?php include ("paginacion.php");?>
	</section>
    <?php include("footer.php"); ?>
  </body>
</html>
<?php
error_reporting(E_ERROR | E_PARSE);
include("db.php");

for($y=1; $y<=2; $y++) {?>
	<div class="pt-4">
	<div class="row">
	  <?php
		for($x = $resultados; $x < $resultados + 4; $x++) {
		  if(isset($x) and $x<$total_resultados) {
			$query = mysqli_query($db,"SELECT * FROM hojas WHERE id = '$arreglo_res[$x]'");
			  
			$res = mysqli_fetch_array($query);
			
			$id = $res['id'];
			$nombre = $res['nombre_pj'];
			$pdf = $res['pdf'];
			$pdf = 'subidas/pdf/' . $pdf;
			$img = $res['img'];
			$img = 'subidas/img/' . $img;
			$autor = $res['autor'];
			$fecha = $res['fecha'];
	  ?>
			
			<div class="col-md-3 col-sm-6 mx-auto">
			  <div class="card card_pj bg-dark rounded" style="width: 105%; text-align: center;">
				<a href="busqueda.php?entrada=<?echo $autor.$fecha;?>">
					<img class="card-img-top" src="<?php echo $img; ?>" alt="Card image cap">
				</a>
				<div class="card-body">
				  <h1> <?php echo "<a class='btn_nombre' href='busqueda.php?entrada={$autor}{$fecha}' style='font-size: 40px'>{$nombre}</a>";?> </h1>
				  <?php echo "<p>Creado por: {$autor}</p>";?>
				  <a href="<?= $pdf ?>" class="btn boton-email" target="_blank" rel="noopener">Ver Hoja del Personaje</a>
				  <?php 
				  if ($_SESSION['usuario_tipo'] == "admin" or $autor == $_SESSION['usuario']) {
				  ?>
					  <form action="operaciones.php" method="post">
						<input type='hidden' name="id" value="<?php echo $id; ?>" />
						<input type='hidden' name="img" value="<?php echo $pdf; ?>" />
						<input type='hidden' name="pdf" value="<?php echo $img; ?>" />
						<button type="submit" class="btn boton-email mt-2" name="btn_eliminar">Eliminar</button>
					  </form>
				  <?php 
				  }
				  ?>
				  <h2 class="card-subtitle mt-2">
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
	<?php
	$resultados = $resultados + 4;
}
	?>
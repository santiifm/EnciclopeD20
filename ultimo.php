<?php
include('db.php');
@session_start();
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
  
  <body>
	  <nav class="navbar navbar-expand-lg navbar-gradiente static-top shadow-sm">
			<div class="col-lg mx-auto">
				<a href="index.php">
					<img src="./img/icon-header.png" alt="" width="368" height="88">
				</a>
			</div>
			<div class="col-lg mx-auto">
				<form class="form-inline">
				  <input class="form-control border-0 bg-dark" type="search" placeholder="Buscar" aria-label="Buscar">
				  <button class="btn btn-default bg-transparent border-0" type="submit">
					<img src="./img/icon-searchwhite.png" width="22" height="22">
				  </button>
				</form>
				<a class="btn bg-transparent" href="login.php">Iniciar Sesión</a>
				<a class="btn bg-transparent" href="ultimo.php">Últimas Creaciones</a>
				<?php
				if (isset($_SESSION['usuario'])){
				echo '<a class="btn bg-transparent" href = "crear.php" style="color: #e41900">Creá tu Personaje</a>';}
				?>
				<?php
				if (isset($_SESSION['usuario'])){
				echo '<a class="btn bg-transparent" href = "crear.php" style="color: #e41900">Mis Creaciones</a>';}
				?>
			</div>
			<div class="col-lg mx-auto">
				<p>Bienvenido
					<?php if (isset($_SESSION['usuario'])){
					echo $_SESSION['usuario'];}
					else echo '<a href="registro.php" style="color: #e41900">Registrate</a> o <a href="login.php" style="color: #e41900">Iniciá Sesión</a>';
					?>
				</p>
				<?php
					if (isset($_SESSION['usuario'])){
					echo '<p><a href = "logout.php" style="color: #e41900">Cerrar Sesión</a></p>';}
				?>
			</div>
		</nav>
	<div class="container-fluid"><div class="main-carousel p-2" id="latestCarousel">
		<div class="row">
  
		  <?php 
			include('buscar_id.php');
			for($x = 0; $x < 4; $x++) {	  
			  // This is the loop to display all
			  // the stored blog posts
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
  </body>
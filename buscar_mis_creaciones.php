<?php
include('db.php');
@session_start();

	
	if (!isset ($_GET['pagina']) ) {  
		$pagina = 1;  
	} else {  
		$pagina = $_GET['pagina'];
	}
	
	if (!isset ($_GET['orden']) ) {  
		$orden = "fecha DESC";  
	} else {  
		$orden = $_GET['orden'];
	}
	
 
	$sql = "SELECT `id` FROM `hojas` WHERE autor = '".$_SESSION['usuario']."' ORDER BY $orden"; 
	$resultado = $db->query($sql);
	   
	if ($resultado->num_rows > 0) {  
	  
		$arreglo_res= array();
		while($row = mysqli_fetch_array($resultado)) {
			array_push($arreglo_res, $row['id']); 
		} 
	}
	else {
		echo "0 results";
	}

	$resultados_por_fila = 4;
	$resultados_por_pagina = 8;
	$resultados = ($pagina - 1) * ($resultados_por_pagina);
	
	$query = mysqli_query($db,"SELECT `id` FROM `hojas` WHERE autor = '".$_SESSION['usuario']."' ORDER BY fecha DESC");
	$total_resultados = mysqli_num_rows($query);
	$numero_paginas = ceil ($total_resultados / $resultados_por_pagina);
?>
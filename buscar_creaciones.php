<?php
include('db.php');
	
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
	
	$sql = "SELECT * FROM hojas ORDER BY $orden"; 
	$resultado = $db->query($sql);
	   
	$i = 0;
	   
	if ($resultado->num_rows > 0) {  
	  
		$arreglo_res= array();
		while($row = $resultado->fetch_assoc()) {
			array_push($arreglo_res,$row['id']); 
		}
	}
	else {
		echo "0 results";
	}
	
	$resultados_por_fila = 4;
	$resultados_por_pagina = 8;
	$resultados = ($pagina - 1) * ($resultados_por_pagina);
	
	$query = mysqli_query($db,"SELECT id FROM hojas");
	$total_resultados = mysqli_num_rows($query);
	$numero_paginas = ceil ($total_resultados / $resultados_por_pagina);
?>
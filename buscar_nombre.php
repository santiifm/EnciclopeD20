<?php
include('db.php');
@session_start();
 
$sql = "SELECT `id` FROM `hojas` WHERE autor = '".$_SESSION['usuario']."'"; 
$resultado = $db->query($sql);
   
$i = 0;
   
if ($resultado->num_rows > 0) {  
  
    $idarray= array();
    while($row = mysqli_fetch_array($resultado)) {  
               
        array_push($idarray,$row['id']); 
    } 
}
else {
    echo "0 results";
}
?>
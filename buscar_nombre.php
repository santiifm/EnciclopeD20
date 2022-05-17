<?php
include('db.php');
@session_start();
 
$sql = "SELECT `id` FROM `hojas` WHERE autor = '".$_SESSION['usuario']."' ORDER BY fecha desc"; 
$resultado = $db->query($sql);
   
$i = 0;
   
if ($resultado->num_rows > 0) {  
  
    // Output data of each row
    $idarray= array();
    while($row = mysqli_fetch_array($resultado)) {  
        
        // Create an array to store the
        // id of the blogs        
        array_push($idarray,$row['id']); 
    } 
}
else {
    echo "0 results";
}
?>

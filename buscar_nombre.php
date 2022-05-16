<?php
include('db.php');
@session_start();
 
/* To sort the id and limit the post by 4 */
$sql = "SELECT `id` FROM `hojas` WHERE autor = '".$_SESSION['usuario']."'"; 
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
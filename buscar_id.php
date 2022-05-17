<?php
include('db.php');
 
/* To sort the id and limit the post by 4 */
$sql = "SELECT * FROM hojas ORDER BY fecha desc limit 20 "; 
$resultado = $db->query($sql);
   
$i = 0;
   
if ($resultado->num_rows > 0) {  
  
    // Output data of each row
    $idarray= array();
    while($row = $resultado->fetch_assoc()) {
        echo "<br>";  
        
        // Create an array to store the
        // id of the blogs        
        array_push($idarray,$row['id']); 
    } 
}
else {
    echo "0 results";
}
?>
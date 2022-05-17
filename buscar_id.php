<?php
include('db.php');
 
/* To sort the id and limit the post by 4 */
$sql = "SELECT * FROM hojas ORDER BY fecha desc"; 
$resultado = $db->query($sql);
   
$i = 0;
   
if ($resultado->num_rows > 0) {  
  
    $idarray= array();
    while($row = $resultado->fetch_assoc()) {
        array_push($idarray,$row['id']); 
    }
}
else {
    echo "0 results";
}
?>
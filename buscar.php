<?php
include('db.php');

  $entrada = $_GET ['entrada'];

    $sql ="SELECT id FROM hojas WHERE MATCH(nombre_pj,autor) AGAINST ('%" . $entrada . "%')";

    $query = mysqli_query($db,$sql);
    $foundnum = mysqli_num_rows($query);


    if ($foundnum==0)
    {
      //echo "We were unable to find a product with a search term of '<b>$entrada</b>'.";
    }
    else{
      //echo "<h1><strong> $foundnum Results Found for '".$entrada."' </strong></h1>";      

      
      $sql ="SELECT id FROM hojas WHERE MATCH(nombre_pj,autor) AGAINST ('%" . $entrada . "%')";
      $resultado = $db->query($sql);
	  $idarray= array();


      while($row = mysqli_fetch_array($resultado))
      {
        array_push($idarray,$row['id']);
      }
	}
?>
<?php

$db=mysqli_connect("localhost","root","milueselmejorperro","encicloped20");


if ($_SESSION['usuario'] == ''){
	unset ($_SESSION['usuario']);
}
?>
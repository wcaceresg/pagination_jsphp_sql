<?php 
$val=$_SERVER["REQUEST_URI"];
if(strpos($val,"modeel")){
	echo "estas en la ruta";
}else{
	echo "no estas en la ruta";
}

 ?>

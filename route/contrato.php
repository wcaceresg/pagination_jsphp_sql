<?php 
include  __DIR__ .'/../app/Components/Core/src/Controller/ContratoController.php';
$route=$_SERVER["REQUEST_URI"];
$val=new ContratoController();
$postData = json_decode(file_get_contents("php://input"), true);


if(strpos($route,"getAll"))
{
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		http_response_code(401);	
		exit;		
	}else{
		$val->getContratos($postData);
	}	
}
else
{
	
}


 ?>
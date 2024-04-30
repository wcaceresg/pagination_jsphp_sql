<?php 
include  __DIR__ .'/../Model/IContrato.php';
include  __DIR__ .'/../Conection.php';
include  __DIR__ .'/../Model/Impl/ContratoModel.php';
class ContratoController
{ 
  private $model;
  public function __construct() {
	$this->model=new ContratoModel;

 } 
 public function getContratos($data){
 	 $this->model->getAll($data);  
 } 

}
 ?>


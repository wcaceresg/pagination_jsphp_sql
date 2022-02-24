<?php 
include  __DIR__ .'/../Model/Iuser.php';
include  __DIR__ .'/../Conection.php';
include  __DIR__ .'/../Model/Impl/User.php';
class UsuarioController implements Iuser
{
 public function select(){
 	 $data=new UserEntidad;
 	 print_r(json_encode($data->getAll()));
  
 } 

}
 ?>


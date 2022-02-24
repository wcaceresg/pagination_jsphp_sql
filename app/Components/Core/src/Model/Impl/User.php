<?php
class UserEntidad extends Conection_Tienda{
    private $conexion;
    public function __construct() {
    	parent::__construct();
        $cn=new Conection_Central();
        $this->conexion=$cn->getConnection();
    }  
    public function getAll(){
         $query="SELECT * FROM usuario";        
         $resultado = $this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
         //$resultado->bindParam(1, $fecha_inicio, PDO::PARAM_STR);
         //$resultado->bindParam(2, $fecha_final, PDO::PARAM_STR);           
         $resultado->execute();
         return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

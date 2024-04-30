<?php
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 29/04/2024
 * Time: 12:05
 */
class ContratoModel implements IContrato{
    private $conexion;
    public function __construct() {
         $cn=new Connection();
        $this->conexion=$cn->getConnection();
    }  
    public function getAll($data){
         $numero_pagina=$data["numero_pagina"];
         $limitador_pagina=$data["limitador"];
         $total_filas=$this->obtener_cantidad_paginas();

         //cantidad de paginadores (1,2,3,4,5,6,Siguiente)
         $last_page=ceil($total_filas/$limitador_pagina);

         //desde
         $from=intval(($limitador_pagina*($numero_pagina-1))+1);
         //hasta
         $to=intval(($limitador_pagina*($numero_pagina)));
         if($numero_pagina==$last_page){
            $to=$total_filas;
         }

         $array=array(
            "pagination"=>array(
                "current_page"=>$numero_pagina,
                "per_page"=>$limitador_pagina,
                "last_page"=>$last_page, // redondear hacia arriba
                "total_records"=>$total_filas,
                "from"=>$from,
                "to"=>$to
            ),
            "contratos"=>$this->getContratos($numero_pagina,$limitador_pagina)
         );
       
         echo json_encode($array);

         
    }
    public function getContratos($numero_pagina,$limitador_pagina){
        $query="
        DECLARE @NUMEROPAGINA int 
        declare @REGISTROS_POR_PAGINA int 
        
        set @NUMEROPAGINA=?
        SET @REGISTROS_POR_PAGINA=?
        SELECT * FROM contratos
        order by id desc
        OFFSET(@NUMEROPAGINA- 1) * @REGISTROS_POR_PAGINA ROWS
        fetch next  @REGISTROS_POR_PAGINA rows ONLY
        
        ";        
        $resultado = $this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $resultado->bindParam(1, $numero_pagina, PDO::PARAM_INT);
        $resultado->bindParam(2, $limitador_pagina, PDO::PARAM_INT);
        $resultado->execute();
        $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function obtener_cantidad_paginas(){
        // cantidad de registros
        $query="
           select count(*)from contratos
        ";        
        $resultado = $this->conexion->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));        
        $resultado->execute();
        return intval($resultado->fetchColumn());
    }
}
?>

<?php 
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 23/02/2022
 * Time: 13:05
 */
class Conection_Central
{        
    public $_connection;
    private static $_instance; //The single instance
    private  $servidor="192.168.1.200";
    private $usuario="sa";
    private $password="Villachicken2016";
    private $bd="Reportes"; 
    // Constructor
    public function __construct()
    {
        //$this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
        $this->_connection =new PDO("sqlsrv:Server=".$this->servidor .";DataBase=".$this->bd."","".$this->usuario ."","".$this->password."");
        // Error handling
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->_connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
    }
     public function getConnection()
    {
        return $this->_connection;
    }
}
class Conection_Tienda
{        
    public $_connection;
    private static $_instance; //The single instance
    private  $servidor="192.168.1.222";
    private $usuario="sa";
    private $password="Villachicken2016";
    private $bd="VILLA_DB_ICA"; 
    // Constructor
    public function __construct()
    {
        //$this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
        $this->_connection =new PDO("sqlsrv:Server=".$this->servidor .";DataBase=".$this->bd."","".$this->usuario ."","".$this->password."");
        // Error handling
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->_connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
    }
     public function getConnection()
    {
        return $this->_connection;
    }
}
class Database
{        
    public $_connection;
    private static $_instance; //The single instance
    // Constructor
    public function __construct($_host,$_username,$_password,$_database)
    {
        //$this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
        $this->_connection =new PDO("sqlsrv:Server=".$_host .";DataBase=".$_database ."","".$_username ."","".$_password."");
        // Error handling
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->_connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
    }
     public function getConnection()
    {
        return $this->_connection;
    }
 
}
 ?>
<?php 
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 29/04/2024
 * Time: 12:05
 */

class Connection
{        
    public $_connection;
    private static $_instance;
    private  $servidor="192.168.1.217";
    private $usuario="sa";
    private $password="Villachicken2016";
    private $bd="INTRANER_GKONG"; 
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


 ?>
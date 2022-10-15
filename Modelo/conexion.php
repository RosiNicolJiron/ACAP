<?php
class conexion extends PDO {

    public function _construct(){
        try{
            parent::__construct("mysql:host=localhost;dbname=acap01","root","");
            parent::exec("set names utf8");
        } 
        catch(PDOException $e){
            echo "Error al conectar" .$e-> getMessage();
            exit;

        }
    }
}


?>
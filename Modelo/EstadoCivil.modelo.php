<?php
require 'conexion.php';


class EstadoCivil{

     //Funcion para Consultar los datos en la base de datos
     public function ConsultarTodo(){
        $conexion=new Conexion();
        $stmt= $conexion-> prepare ("SELECT * tbl_estadocivil");
        $stmt-> excute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

     }

      //Funcion para Consultar por codigo los datos en la base de datos
      public function ConsultarPorId($cod_estado_civil){

        $conexion=new Conexion();
        $stmt= $conexion-> prepare ("SELECT * tbl_estadocivil WHERE cod_estado_civil= :cod_estado_civil ");
        $stmt-> bindValue(":cod_estado_civil",$codigoestadocivil,PDO::PARAM_INT);
        $stmt-> excute();
        return $stmt->fetch(PDO::FETCH_OBJ);

      }




    //Funcion para guardar los datos en la base de datos
    public function Guardar( $nombre_estado_civil){
        
        $conexion = new Conexion ();
        $stmt = $conexion->prepare("INSERT TO INTO 'tbl_estadocivil'
                                                    ('nombre_estado_civil')
                                                     VALUES (
                                                             :nombre_estado_civil);");
      
      $stmt->binvalue (":nombre_estado_civil", $nombreestadocivil, PDO:: PARAM_STR);

        if($stmt-> execute()){
        return "OK";
       }else{
        return "Error: Se ha generado un error al guardar la informacion";

         }
    }

    //Funcion para modificar los datos en la base de datos
    public function Modificar($codigoestadocivil, $nombreestadocivil){
        
        $conexion = new Conexion ();
        $stmt = $conexion->prepare("UPDATE 'tbl_estadocivil'
                                                    SET(
                                                     'nombre_estado_civil'=:nombre_estado_civil

                                                    WHERE 'cod_estado_civil'=:cod_estado_civil);");
      $stmt->binvalue (":cod_estado_civil", $codigoestadocivil, PDO:: PARAM_INT);
      $stmt->binvalue (":nombre_estado_civil", $nombreestadocivil, PDO:: PARAM_STR);

        if($stmt-> execute()){
        return "OK";
       }else{
        return "Error: Se ha generado un error al modificar la informacion";

         }
    }
   //Funcion para eliminar los datos en la base de datos
   public function Eliminar($codigoestadocivil){
        
    $conexion = new Conexion ();
    $stmt = $conexion->prepare("DELETE FROM tbl_estadocivil WHERE cod_estado_civil= :cod_estado_civil");
  $stmt->binvalue (":cod_estado_civil", $codigoestadocivil, PDO:: PARAM_INT);
    if($stmt-> execute()){
    return "OK";
   }else{
    return "Error: Se ha generado un error al Eliminar la informacion";

     }
}




}

?>
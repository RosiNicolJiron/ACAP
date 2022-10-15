<?php
require '../Modelo/EstadoCivil.modelo.php';

if($_POST){
        $estadocivil = new EstadoCivil();

        switch($_POST["accion"]){
             case "CONSULTAR":
                echo json_encode($estadocivil->Consultar());
             break;

             case "CONSULTAR_ID":
                echo json_encode($estadocivil->ConsultarPorId($_POST["cod_estado_civil"]));
             break;

             case "GUARDAR":
                $nombreestadocivil = $_POST["nombre_estado_civil"];
                $respuesta= $estadocivil->Guardar($nombreestadocivil);
                echo json_encode($respuesta);
             break;

             case "MODIFICAR":
                $nombreestadocivil = $_POST["nombre_estado_civil"];
                $codigoestadocivil = $_POST["cod_estado_civil"];
                $respuesta = $estadocivil->Modificar($codigoestadocivil,$nombreestadocivil);
                echo json_encode($respuesta);
             break;

             case "ELIMINAR":
                $codigoestadocivil =$_POST["cod_estado_civil"];
                $respuesta = $estadocivil->Eliminar($codigoestadocivil);
                echo json_encode($respuesta);
             break; 
        }
}


?>
<?php

require_once("../Models/conexion.php");
$alert = '';


if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['especialidad'])) {

        $alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';

        }else{

            
            $nombre       = $_POST['nombre'];
            $especialidad = $_POST['especialidad'];
            $dia          = $_POST['dia'];
            $hora         = $_POST['hora'];
            $Tcobro       = $_POST['Tcobro'];
            $rol          = $_POST['rol'];
            $estatus      = $_POST['estatus'];
           
            

       /* $query = mysqli_query($conection,"SELECT * FROM usuarios WHERE dia = '$dia' or usuario = '$usuario' or especialidad = '$especialidad'");

        $resultado = mysqli_fetch_array($query);

        if ($resultado > 0) {
            $alert = '<p class = "msg_error">La dia o el especialidad o Usuario ya existen</p>';
        }else{*/

            $query_insert = mysqli_query($conection,"INSERT INTO medicos(nombre,especialidad,dia,hora,Tcobro,rol,estatus)
                VALUES('$nombre','$especialidad','$dia','$hora','$Tcobro','$rol','$estatus')");

            if ($query_insert ) {
              
                
                $alert = '<div >Medico grabado con exito !!!!</div>';
            }else{
              
             $alert = '<div>Error al Grabar</div>'; 
         }

       }
    }
//}


<?php 



require_once("../Models/conexion.php");
$alert = '';


	if (!empty($_POST)) {
		
	
		if (empty( $_POST['descripcion']) || empty($_POST['monto'])) {
	
			$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	
		}else{
	
			$id              = $_POST['id'];
			$descripcion     = $_POST['descripcion'];
			$monto           = $_POST['monto'];
			$created_at      = $_POST['created_at'];
					
	
	
	//echo "SELECT * FROM usuario
	
			//WHERE(usuario = '$user' AND idusuario != $iduser) or (correo = '$email' AND idusuario != $iduser";
	//exit; sirve para ejectuar la consulta en mysql
			$query = mysqli_query($conection,"SELECT * FROM gastos
				WHERE  id != id"
			);
	
			$resultado = mysqli_fetch_array($query);
	
	
		}
	
		if ($resultado > 0) {
			$alert = '<p class = "msg_error">El Registro ya existe,ingrese otro</p>';
	
		}else{
	
			$sql_update = mysqli_query($conection,"UPDATE gastos SET descripcion = '$descripcion',monto = '$monto', created_at = '$created_at'
				WHERE id = $id");
	
			if ($sql_update) {
	
				$alert = '<p class = "msg_success">Actualizado Correctamente</p>';
	
			}else{
				$alert = '<p class = "msg_error">Error al Actualizar el Registro</p>';
			}
		}
	}

//Recuperacion de datos para mostrar al seleccionar Actualizar

if (empty($_REQUEST['id'])) {
	header('location: ../Templates/gastos.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection,"SELECT * FROM gastos  WHERE id = $id");   

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	header("location: ../Templates/gastos.php");
}else{
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {
		
		$id           = $data['id'];
		$descripcion  = $data['descripcion'];
		$monto        = $data['monto'];
		$created_at   = $data['created_at'];
		

	}
}
<?php 

require_once("../Models/conexion.php");



	if (!empty($_POST)) {
		$alert = '';
	
		if (empty($_POST['forma_pago']) ||  empty($_POST['tipo_salida']) || empty($_POST['monto']) || empty($_POST['concepto'])) {
	
			$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	
		}else{
	
            $id            = $_POST['id'];
            $forma_pago    = $_POST['forma_pago'];
            $nro_cheque    = $_POST['nro_cheque'];
            $tipo_salida   = $_POST['tipo_salida'];
            $monto         = $_POST['monto'];
            $concepto      = trim($_POST['concepto']);
            $fecha         = $_POST['fecha'];
           
	
	
	//echo "SELECT * FROM usuario
	
			//WHERE(usuario = '$user' AND idusuario != $iduser) or (correo = '$email' AND idusuario != $iduser";
	//exit; sirve para ejectuar la consulta en mysql
			$query = mysqli_query($conection,"SELECT * FROM caja_chica
				WHERE  id != id"
			);
	
			$resultado = mysqli_fetch_array($query);
	
	
		}
	
		if ($resultado > 0) {
			$alert = '<p class = "msg_error">El Registro ya existe,ingrese otro</p>';
	
		}else{
	
			$sql_update = mysqli_query($conection,"UPDATE caja_chica SET forma_pago = '$forma_pago',nro_cheque = '$nro_cheque',
            tipo_salida = '$tipo_salida',monto = '$monto',concepto = '$concepto', fecha = '$fecha'
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
	header('location: ../Plantillas/caja_chica.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection,"SELECT * FROM caja_chica  WHERE id = $id");   

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	header("location: ../Plantillas/caja_chica.php");
}else{
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {
		
		$id            = $data['id'];
        $forma_pago    = $data['forma_pago'];
        $nro_cheque    = $data['nro_cheque'];
        $tipo_salida   = $data['tipo_salida'];
        $monto         = number_format($data['monto'], 3,'.','.');
        $concepto      = $data['concepto'];
        $fecha         = $data['fecha'];

	}
}


<?php 



require_once("../Models/conexion.php");
$alert = '';

	if (!empty($_POST)) {
		
	
		if (empty( $_POST['Estudio']) || empty($_POST['SinSeguro']) || empty($_POST['SEMEI']) || empty($_POST['SemeiPref']) ||empty($_POST['Seguros'])) {
	
			$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	
		}else{
	
			$id              = $_POST['id'];
			$Estudio         = $_POST['Estudio'];
			$SinSeguro       = $_POST['SinSeguro'];
			$SEMEI           = $_POST['SEMEI'];
			$SemeiPref       = $_POST['SemeiPref'];
			$Seguros         = $_POST['Seguros'];
			$SegurosPref     = $_POST['SegurosPref'];
			$Hospitalar      = $_POST['Hospitalar'];
			
	
	
	//echo "SELECT * FROM usuario
	
			//WHERE(usuario = '$user' AND idusuario != $iduser) or (correo = '$email' AND idusuario != $iduser";
	//exit; sirve para ejectuar la consulta en mysql
			$query = mysqli_query($conection,"SELECT * FROM tarifas
				WHERE  id != id"
			);
	
			$resultado = mysqli_fetch_array($query);
	
	
		}
	
		if ($resultado > 0) {
			$alert = '<p class = "msg_error">El Registro ya existe,ingrese otro</p>';
	
		}else{
	
			$sql_update = mysqli_query($conection,"UPDATE tarifas SET Estudio = '$Estudio',SinSeguro = '$SinSeguro', SEMEI = '$SEMEI',
            SemeiPref = '$SemeiPref',Seguros = '$Seguros', SegurosPref = '$SegurosPref', Hospitalar = '$Hospitalar'
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
	header('location: ../Plantillas/estudios.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection,"SELECT * FROM tarifas  WHERE id = $id");   

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	header("location: ../Plantillas/estudios.php");
}else{
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {
		
		$id           = $data['id'];
		$Estudio      = $data['Estudio'];
		$SinSeguro    = $data['SinSeguro'];
		$SEMEI        = $data['SEMEI'];
		$SemeiPref    = $data['SemeiPref'];
		$Seguros      = $data['Seguros'];
		$SegurosPref  = $data['SegurosPref'];
		$Hospitalar   = $data['Hospitalar'];

	}
}

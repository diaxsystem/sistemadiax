<?php

require_once('../Models/conexion.php');
$alert = '';

if (!empty($_POST)) {
	if ( empty($_POST['nombre']) || empty($_POST['especialidad'])) {

		$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	} else {

		$id              = $_POST['id'];
		$especialidad    = $_POST['especialidad'];
		$nombre          = $_POST['nombre'];
		$hora            = $_POST['hora'];
		$dia             = $_POST['dia'];
		$Tcobro          = $_POST['Tcobro'];



		//echo "SELECT * FROM usuario

		//WHERE(usuario = '$user' AND id != $iduser) or (hora = '$email' AND id != $iduser";
		//exit; sirve para ejectuar la consulta en mysql
		$query = mysqli_query(
			$conection,
			"SELECT * FROM medicos
				WHERE  id != id"
		);

		$resultado = mysqli_fetch_array($query);
	}

	if ($resultado > 0) {
		$alert = '<p class = "msg_error">El Registro ya existe,ingrese otro</p>';
	} else {

		$sql_update = mysqli_query($conection, "UPDATE medicos SET especialidad = '$especialidad',nombre = '$nombre',dia = '$dia', hora = '$hora',Tcobro = '$Tcobro', estatus = 1
				WHERE id = $id");

		if ($sql_update) {

			echo $alert = '<p class = "msg_success">Actualizado Correctamente</p>';
		} else {
			echo $alert = '<p class = "msg_error">Error al Actualizar el Registro</p>';
		}
	}
}

//Recuperacion de datos para mostrar al seleccionar Actualizar

if (empty($_REQUEST['id'])) {
	header('location: ../Templates/medicos.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection, "SELECT m.id,m.nombre,m.especialidad,m.dia,m.hora,m.Tcobro
FROM medicos m  where m.id = $id AND m.estatus = 1");

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	header("location: ../Templates/medicos.php");
} else {
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {

		$id           = $data['id'];
		$especialidad = $data['especialidad'];
		$nombre       = $data['nombre'];
		$hora         = $data['hora'];
		$dia          = $data['dia'];
		$Tcobro       = $data['Tcobro'];
		

	}
}


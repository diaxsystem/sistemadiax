<?php

require_once('../Models/conexion.php');
$alert = '';

if (!empty($_POST)) {
	if (empty($_POST['cedula']) || empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['fecha_nac'])) {

		$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	} else {

		$id                  = $_POST['id'];
		$cedula              = $_POST['cedula'];
		$nombre              = $_POST['nombre'];
		$telefono            = $_POST['telefono'];
		$fecha_nac           = $_POST['fecha_nac'];
		$sexo                = $_POST['sexo'];



		//echo "SELECT * FROM usuario

		//WHERE(usuario = '$user' AND idusuario != $iduser) or (correo = '$email' AND idusuario != $iduser";
		//exit; sirve para ejectuar la consulta en mysql
		$query = mysqli_query(
			$conection,
			"SELECT * FROM usuario
				WHERE  id_usuario != id_usuario"
		);

		$resultado = mysqli_fetch_array($query);
	}

	if ($resultado > 0) {
		$alert = '<p class = "msg_error">El Registro ya existe,ingrese otro</p>';
	} else {

		$sql_update = mysqli_query($conection, "UPDATE usuario SET cedula = '$cedula',nombre = '$nombre', telefono = '$telefono',fecha_nac = '$fecha_nac',sexo = '$sexo', estatus = 1
				WHERE id_usuario = $id");

		if ($sql_update) {

			echo $alert = '<p class = "msg_success">Actualizado Correctamente</p>';
		} else {
			echo $alert = '<p class = "msg_error">Error al Actualizar el Registro</p>';
		}
	}
}

//Recuperacion de datos para mostrar al seleccionar Actualizar

if (empty($_REQUEST['id'])) {
	header('location: ../Templates/clientes.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection, "SELECT u.id_usuario,u.cedula,u.nombre,u.fecha_nac,u.sexo,u.telefono
FROM usuario u   where u.id_usuario = $id AND u.estatus = 1");

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	header("location: ../Templates/clientes.php");
} else {
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {

		$id             = $data['id_usuario'];
		$cedula         = $data['cedula'];
		$nombre         = $data['nombre'];
		$telefono       = $data['telefono'];
		$fecha_nac      = $data['fecha_nac'];
		$sexo           = $data['sexo'];
	

	}
}


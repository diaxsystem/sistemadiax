<?php

require_once('../Models/conexion.php');
$alert = '';

if (!empty($_POST)) {
	if (empty($_POST['cedula']) || empty($_POST['nombre']) || empty($_POST['celular']) || empty($_POST['nacimiento'])) {

		$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	} else {

		$id                  = $_POST['id'];
		$cedula              = $_POST['cedula'];
		$nombre              = $_POST['nombre'];
		$apellido            = $_POST['apellido'];
		$celular             = $_POST['celular'];
		$nacimiento          = $_POST['nacimiento'];
		$sexo                = $_POST['sexo'];



		//echo "SELECT * FROM usuario

		//WHERE(usuario = '$user' AND id != $iduser) or (correo = '$email' AND id != $iduser";
		//exit; sirve para ejectuar la consulta en mysql
		$query = mysqli_query(
			$conection,
			"SELECT * FROM clientes
				WHERE  id != id"
		);

		$resultado = mysqli_fetch_array($query);
	}

	if ($resultado > 0) {
		$alert = '<p class = "msg_error">El Registro ya existe,ingrese otro</p>';
	} else {

		$sql_update = mysqli_query($conection, "UPDATE clientes SET cedula = '$cedula',nombre = '$nombre', apellido = '$apellido', celular = '$celular',nacimiento = '$nacimiento',sexo = '$sexo', estatus = 1
				WHERE id = $id");

		if ($sql_update) {

			echo $alert = '<p class = "msg_success">Actualizado Correctamente</p>';
		} else {
			echo $alert = '<p class = "msg_error">Error al Actualizar el Registro</p>';
		}
	}
}

//Recuperacion de datos para mostrar al seleccionar Actualizar
// echo $_REQUEST['id'];
// exit();
if (empty($_REQUEST['id'])) {
	header('location: ../Templates/clientes.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection, "SELECT c.id,c.Cedula,c.Nombre,c.Apellido,c.Celular,c.Sexo,c.Nacimiento 
FROM clientes c WHERE c.id = $id AND c.estatus = 1");

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	echo "No se encontro la Informacion del Paciente";
} else {
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {

		$id             = $data['id'];
		$cedula         = $data['Cedula'];
		$nombre         = $data['Nombre'];
		$apellido       = $data['Apellido'];
		$celular        = $data['Celular'];
		$nacimiento     = $data['Nacimiento'];
		$sexo           = $data['Sexo'];
	

	}
}


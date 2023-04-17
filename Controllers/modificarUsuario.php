<?php

require_once('../Models/conexion.php');
$alert = '';

if (!empty($_POST)) {
	if (empty($_POST['cedula']) || empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['correo']) || empty($_POST['rol'])) {

		$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';
	} else {

		$id                  = $_POST['id'];
		$cedula              = $_POST['cedula'];
		$nombre              = $_POST['nombre'];
		$correo              = $_POST['correo'];
		$usuario             = $_POST['usuario'];
		$pass                = md5($_POST['password']);
		$rol                 = $_POST['rol'];



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

		$sql_update = mysqli_query($conection, "UPDATE usuario SET cedula = '$cedula',nombre = '$nombre',usuario = '$usuario', pass = '$pass',correo = '$correo',rol = '$rol', estatus = 1
				WHERE idusuario = $id");

		if ($sql_update) {

			echo $alert = '<p class = "msg_success">Actualizado Correctamente</p>';
		} else {
			echo $alert = '<p class = "msg_error">Error al Actualizar el Registro</p>';
		}
	}
}

//Recuperacion de datos para mostrar al seleccionar Actualizar

if (empty($_REQUEST['id'])) {
	header('location: ../Templates/usuarios.php');

	//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

}

$id = $_REQUEST['id'];

$sql = mysqli_query($conection, "SELECT u.idusuario,u.cedula,u.nombre,u.correo,u.usuario,u.pass,u.rol,r.descripcion 
FROM usuarioS u INNER JOIN roles r ON r.id_rol = u.rol  where u.idusuario = $id AND u.estatus = 1");

//mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
	header("location: ../Templates/usuarios.php");
} else {
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {

		$id          = $data['idusuario'];
		$cedula      = $data['cedula'];
		$nombre      = $data['nombre'];
		$correo      = $data['correo'];
		$usuario     = $data['usuario'];
		$pass        = md5($data['pass']);
		$rol         = $data['rol'];
		$descripcion = $data['descripcion'];

	}
}


<?php

require_once "../Models/conexion.php";
	

	$id=$_POST['id'];

	$estatus = 0;
	
	

	$sql = "UPDATE usuarios set 
                estatus = '$estatus'
                    WHERE idusuario = '$id'";
    echo $resultado = mysqli_query($conection,$sql);

 ?>
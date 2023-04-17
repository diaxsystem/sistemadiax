<?php


require_once("../Models/conexion.php");
$alert = '';
if (!empty($_POST)) {
	

	if (empty($_POST['Estudio']) || empty($_POST['SinSeguro']) || empty($_POST['SEMEI']) || empty($_POST['SemeiPref']) || empty($_POST['Seguros']) || empty($_POST['SegurosPref'])) {

		$alert = '<p class = "msg_error">Debe llenar Todos los Campos</p>';

	}else{

		$Estudio       = $_POST['Estudio'];
		$SinSeguro     = $_POST['SinSeguro'];
		$SEMEI         = $_POST['SEMEI'];
		$SemeiPref     = $_POST['SemeiPref'];
		$Seguros       = $_POST['Seguros'];
		$SegurosPref   = $_POST['SegurosPref'];
		$Hospitalar    = $_POST['Hospitalar'];
		$estatus       = $_POST['estatus'];
		

		$resultado = 0;

		$query = mysqli_query($conection,"SELECT * FROM tarifas WHERE Estudio = '$Estudio' ");

		$resultado = mysqli_fetch_array($query);



			$query_insert = mysqli_query($conection,"INSERT INTO tarifas(Estudio,SEMEI,SinSeguro,SegurosPref,SemeiPref,Seguros,Hospitalar,estatus)
				VALUES('$Estudio','$SEMEI','$SinSeguro','$SegurosPref','$SemeiPref','$Seguros','$Hospitalar','$estatus')");

			if ($query_insert ) {
				$alert = '<p class = "msg_save">Registro Guardado Correctamente</p>';

			}else{
				$alert = '<p class = "msg_error">Error al Guardar el Registro</p>';
			}

	}
	mysqli_close($conection);
}
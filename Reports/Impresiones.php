<?php
require_once("../includes/header_admin.php");

require_once('../Models/conexion.php');
$sql = mysqli_query($conection,"SELECT h.id,c.Nombre,c.Apellido,c.Celular,c.Nacimiento,h.Estudio,h.Cedula,h.Atendedor,h.Fecha,h.Seguro,h.Monto,h.Descuento,h.MontoS,h.Comentario, h.fecha_2 
FROM historial h inner join clientes c on c.cedula = h.cedula   ORDER BY h.id DESC LIMIT 1");

mysqli_close($conection);//con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php

//echo 'paso el sql';
//exit();


$resultado = mysqli_num_rows($sql);

if ($resultado == 0) {
     
	header("location: ../Plantillas/comprobantes.php");
}else{
	$option = '';
    $cont = 0;
	while ($data = mysqli_fetch_array($sql)) {
		$cont++;
		$id          = $data['id'];
		$Cedula      = $data['Cedula'];
		$Estudio     = $data['Estudio'];
		$Atendedor   = $data['Atendedor'];
		$Seguro      = $data['Seguro'];
		$Monto       = $data['Monto'];
		$Descuento   = $data['Descuento'];
		$Comentario  = $data['Comentario'];
		$Fecha       = $data['Fecha'];
		$Nombre      = $data['Nombre'];
		$Apellido    = $data['Apellido'];
		$Celular     = $data['Celular'];
		$Nacimiento    = $data['Nacimiento'];

	}
}

?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class=" shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-black text-capitalize ps-3 text-center">Impresiones de Comprobantes</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Recibo</p>
                                                <hr>
                                                <h3 class="mb-0">Imprimir Recibo</h3>
                                            </div>
                                            <br>
                                            <i class="typcn typcn-credit-card icon-xl text-secondary"></i>
                                        </div>
                                        <a href="Recibo.php?id=<?php echo $id; ?>" class="btn btn-success" target="_blank">Recibo</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Factura</p>
                                                <hr>
                                                <h3 class="mb-0">Imprimir Factura</h3>
                                            </div>
                                            <i class="typcn typcn-credit-card icon-xl text-secondary"></i>
                                        </div>
                                        <a href="Factura.php?id=<?php echo $id; ?>" class="btn btn-danger" target="_blank">Factura</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                                            <div>
                                                <p class="mb-2 text-md-center text-lg-left">Comprobante</p>
                                                <hr>
                                                <h3 class="mb-0">Imprimir Reporte</h3>
                                            </div>
                                            <i class="typcn typcn-credit-card icon-xl text-secondary"></i>
                                        </div>
                                        <a href="Reporte.php?id=<?php echo $id; ?>" class="btn btn-info" target="_blank">Comprobante</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include('../includes/footer_admin.php'); ?>

            <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
            <script src="../assets/js/sweetalert2.min.js"></script>
            <script src="../assets/js/core/popper.min.js"></script>
            <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
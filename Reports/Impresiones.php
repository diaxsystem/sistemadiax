<?php
require_once("../includes/header_admin.php");

if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
    if (empty($_SESSION['active'])) {
        header('location: salir.php');
    }
} else {
    header('location: salir.php');
}

require_once('../Models/conexion.php');

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
                                                <h3 class="mb-0" >Imprimir  Recibo</h3>
                                            </div>
                                            <br>
                                            <i class="typcn typcn-credit-card icon-xl text-secondary"></i>
                                        </div>
                                        <a href="Recibo.php" class="btn btn-success" target="_blank">Recibo</a>
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
                                        <a href="Factura.php" class="btn btn-danger" target="_blank">Factura</a>
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
                                        <a href="Reporte.php" class="btn btn-info" target="_blank">Comprobante</a>
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
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
                        <h4>Rendicion de Estudios <i class="typcn typcn-flow-children"></i> </h4>

                        <form class="row" method="POST" id='formEstudios' name='formEstudios'>
                    <div class="col-md-5">
                        <div class="widget-small">
                            <input type="date" name="fecha_desde" id="fecha_desde" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="widget-small">
                            <input type="date" name="fecha_hasta" id="fecha_hasta" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-search"></i>Filtrar

                    </div>
            </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="table-responsive">
                            <table id="tablaResultado" class="table table-striped table-bordered table-condensed" style="width:100%">

                            </table>
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
        <script type="text/javascript">
            $('#formEstudios').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: '../Data/BuscarEstudio.php',
                    data: form.serialize(),
                    success: function(data) {
                        $('#tablaResultado').html('');
                        $('#tablaResultado').append(data);
                    }

                });

            });
        </script>
     
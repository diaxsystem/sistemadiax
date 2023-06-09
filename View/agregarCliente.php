<?php
require_once("../includes/header_admin.php");
$alert = '';
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Agregar Cliente <i class="typcn typcn-user"></i></h4>
                            <p class="card-description text-center">
                                Datos del Cliente a grabar
                            </p>
                            <form class="forms-sample" method="POST" action="../Controllers/grabarPaciente.php">
                                <div class="form-group">
                                    <label for="Cedula">Cedula :</label>
                                    <input type="text" class="form-control" id="Cedula" name="Cedula" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nombre">Nombre :</label>
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="Apellido">Apellido :</label>
                                    <input type="text" class="form-control" id="Apellido" name="Apellido" required>
                                </div>
                                <div class="form-group">
                                    <label for="Celular">Telefono :</label>
                                    <input type="text" class="form-control" id="Celular" name="Celular" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nacimiento">Fecha Nacimiento :</label>
                                    <input type="date" class="form-control" id="Nacimiento" name="Nacimiento" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Sexo</label>
                                    <select class="form-control" type="text" name="Sexo" id="Sexo" required>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                                <a class="btn btn-light" href="../Templates/orden.php">Cancelar</a>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('../includes/footer_admin.php'); ?>
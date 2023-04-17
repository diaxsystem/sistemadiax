<?php
require_once("../includes/header_admin.php");
require_once('../Controllers/grabarMedico.php');
?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Agregar Medico <i class="typcn typcn-user"></i></h4>
              <p class="card-description text-center">
                Datos del medico a grabar
              </p>
              <form class="forms-sample" method="POST" action="">
                <div class="form-group">
                  <label for="nombre">Nombre :</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                  <label for="especialidad">Especialidad :</label>
                  <input type="text" class="form-control" id="especialidad" name="especialidad">
                </div>
                <div class="form-group">
                  <label for="dia">Dias de Atención :</label>
                  <input type="text" class="form-control" id="dia" name="dia">
                </div>
                <div class="form-group">
                  <label for="hora">Horario de Atención :</label>
                  <input type="text" class="form-control" id="hora" name="hora">
                </div>
                <div class="form-group">
                  <label for="Tcobro">Cantidad de Cobro :</label>
                  <input type="text" class="form-control" id="Tcobro" name="Tcobro">
                </div>
                <input type="hidden" name="estatus" id="estatus" value="1">
                <input type="hidden" name="rol" id="rol" value="4">
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a class="btn btn-light" href="../Templates/medicos.php">Cancelar</a>
                <br>
                <?php if ($alert != "") {  ?>
                  <div class="btn btn-outline-primary btn-lg w-100 mt-4 mb-0">
                    <p style="color:#fff;">
                      <?php echo $alert; ?>
                    </p>
                  </div>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php include('../includes/footer_admin.php'); ?>
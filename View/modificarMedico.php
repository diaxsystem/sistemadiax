<?php
require_once("../includes/header_admin.php");
require_once('../Controllers/modificarMedico.php');
?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Modificar Medico <i class="typcn typcn-user"></i></h4>
              <p class="card-description text-center">
                Datos del medico a modificar
              </p>
              <form class="forms-sample" method="POST" action="">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" >
                  <label for="nombre">Nombre :</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                </div>
                <div class="form-group">
                  <label for="especialidad">Especialidad :</label>
                  <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $especialidad;?>">
                </div>
                <div class="form-group">
                  <label for="dia">Dias de Atención :</label>
                  <input type="text" class="form-control" id="dia" name="dia" value="<?php echo $dia;?>">
                </div>
                <div class="form-group">
                  <label for="hora">Horario de Atención :</label>
                  <input type="text" class="form-control" id="hora" name="hora" value="<?php echo $hora;?>">
                </div>
                <div class="form-group">
                  <label for="Tcobro">Cantidad de Cobro :</label>
                  <input type="text" class="form-control" id="Tcobro" name="Tcobro" value="<?php echo $Tcobro;?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
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
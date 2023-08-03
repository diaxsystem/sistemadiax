<?php
echo $_REQUEST['id'];
exit();
require_once("../Controllers/modificarPaciente.php");
require_once("../includes/header_admin.php");
?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Actualizar Usuario <i class="typcn typcn-user"></i></h4>
              <p class="card-description text-center">
                Datos del Usuario a modificar
              </p>
              <form class="forms-sample" method="POST" action="">
                <div class="form-group">
                  <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                  <label for="cedula">Cedula :</label>
                  <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cedula; ?>">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre :</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido :</label>
                  <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>">
                </div>
                <div class="form-group">
                  <label for="celular">Telefono :</label>
                  <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $celular; ?>">
                </div>
                <div class="form-group">
                  <label for="fecha_nac">Fecha Nacimiento :</label>
                  <input type="text" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $nacimiento; ?>">
                </div>
                <div class="form-group">
                  <label for="sexo">Sexo :</label>
                  <input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo $sexo; ?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a class="btn btn-light" href="../Templates/clientes.php">Cancelar</a>
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
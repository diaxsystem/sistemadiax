<?php
require_once("../includes/header_admin.php");
require_once("../Controllers/modificarUsuario.php");
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
                  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>">
                  <label for="cedula">Cedula :</label>
                  <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cedula; ?>">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre :</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                  <label for="correo">Correo :</label>
                  <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>">
                </div>
                <div class="form-group">
                  <label for="usuario">Usuario :</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>">
                </div>
                <div class="form-group">
                  <label for="usuario">Password :</label>
                  <input type="password" class="form-control" id="password" name="password" value="<?php echo $pass; ?>">
                </div>
                <div class="form-group">
                  <label for="rol">Puesto :</label>
                  <select name="rol" id="rol" class="form-control">
                    <option value="<?php echo $rol; ?>"><?php echo $descripcion; ?></option>
                    <?php if ($_SESSION['rol'] == 1) { ?>
                      <option value="">Seleccione el rol a asignar</option>
                      <option value="1">Administrador</option>
                    <?php } ?>
                    <option value="2">Recepcionista</option>
                    <option value="3">Paciente</option>
                    <option value="4">Doctor</option>
                    <option value="5">Radiologo 1</option>
                    <option value="6">Radiologo 2</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a class="btn btn-light" href="../Templates/usuarios.php">Cancelar</a>
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
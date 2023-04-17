<?php

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
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="nombre">Nombre :</label>
                      <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo :</label>
                      <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group">
                      <label for="usuario">Usuario :</label>
                      <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                      <label for="usuario">Password :</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                      <label for="rol">Puesto :</label>
                      <?php
                      include "../Models/conexion.php";

                      $query_roles = mysqli_query($conection, "SELECT * FROM roles where id_rol  > 1 AND estatus = 1");

                      mysqli_close($conection); //con esto cerramos la conexion a la base de datos una vez conectado arriba con el conexion.php
                      $resultado = mysqli_num_rows($query_roles);

                      ?>
                      <select name="rol" id="rol" class="form-control">
                          <?php

                          if ($resultado > 0) {
                              while ($rol = mysqli_fetch_array($query_roles)) {

                          ?>
                                  <option value="<?php echo $rol["id"]; ?>"><?php echo
                                          $rol["descripcion"] ?></option>

                          <?php


                              }
                          }

                          ?>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a class="btn btn-light" href="../Templates/usuarios.php">Cancelar</a>
                  </form>
                </div>
              </div>
            </div>
            </div>

            <?php include('../includes/footer_admin.php'); ?>

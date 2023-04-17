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
                   
                            <h4>Usuarios del Sistema <a href="../View/agregarUsuario.php" class="btn btn-primary mr-2"><i class="typcn typcn-user-add"></i> Registrar</a></h4>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="tabla">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Correo
                                        </th>
                                        <th>
                                            Usuario
                                        </th>

                                        <th>
                                            Puesto
                                        </th>
                                        <th>
                                            Editar
                                        </th>
                                        <th>
                                            Eliminar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conection, "SELECT u.idusuario,u.nombre,u.correo,u.usuario,r.descripcion 
                                    FROM usuarios u INNER JOIN roles r ON r.id = u.rol  where  u.estatus = 1 ORDER BY  u.idusuario DESC");

                                    $resultado = mysqli_num_rows($sql);

                                    if ($resultado > 0) {
                                        while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $data['idusuario']; ?></td>
                                                <td><?php echo $data['nombre']; ?></td>
                                                <td><?php echo $data['correo']; ?></td>
                                                <td><?php echo $data['usuario']; ?></td>
                                                <td><?php echo $data['descripcion'] ?></td>
                                                <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {?>
                          <td>
                             <a href="../View/modificarUsuario.php?id=<?php echo $data['idusuario']; ?>"class="btn btn-outline-info" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px  rgba(0, 0, 0, 0.25);"><i class="typcn typcn-edit"></i></a>
                          </td>
                      <?php } ?>
                      <?php if($_SESSION['rol'] == 1 ){ ?>
                          <td>
                            <button onclick="EliminarUsuario('<?php echo $data['idusuario']; ?>')"
                            class="btn btn-outline-danger" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px  rgba(0, 0, 0, 0.25);"><i class="typcn typcn-user-delete-outline"></i></button>
                          </td>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 2 ){ ?>
                      <td>
                        <a href="#" onclick="permisoAuto()" class="btn btn-outline-danger" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px  rgba(0, 0, 0, 0.25);"><i class="typcn typcn-user-delete-outline"></i></a>
                      </td>
                    <?php } ?>  
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('../includes/footer_admin.php'); ?>
            <!-- base:js -->
            <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
            <!-- endinject -->
            <!-- base:js -->
            <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
            <!-- endinject -->
            <!-- base:js -->
            <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
            <!-- endinject -->
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

                        <h4>Medicos del Sistema <a href="../View/agregarMedico.php" class="btn btn-primary mr-2"><i class="typcn typcn-user-add"></i> Registrar</a></h4>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="tabla">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Especialidad</th>
                                        <th>Dia</th>
                                        <th>Hora</th>
                                        <th>Tcobro</th>
                                        <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2  || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 6) { ?>
                                            <th>Editar</th>
                                            <th>Agregar</th>
                                        <?php } ?>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                 if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
                                    $sql = mysqli_query($conection, "SELECT m.id,m.Nombre,m.usuario,m.Especialidad,m.Dia,m.Hora,m.Tcobro FROM medicos m 
                                            WHERE m.estatus = 1 ORDER BY  m.id DESC");
                                            
                                  } else if ($_SESSION['rol'] == 5 || $_SESSION['rol'] == 6) {
                    
                                    $sql = mysqli_query($conection, "SELECT m.id,m.Nombre,m.usuario,m.Especialidad,m.Dia,m.Hora,m.Tcobro 
                                            FROM medicos m WHERE m.Especialidad LIKE '%Informante%' AND m.estatus = 1 ORDER BY   m.id DESC");
                                  }
                                    $resultado = mysqli_num_rows($sql);

                                    if ($resultado > 0) {
                                        while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                            <tr class="text-center">

                                                <td><?php echo $data['id']; ?></td>
                                                <td><?php echo $data['Nombre']; ?></td>
                                                <td><?php echo $data['usuario']; ?></td>
                                                <td><?php echo $data['Especialidad']; ?></td>
                                                <td><?php echo $data['Dia']; ?></td>
                                                <td><?php echo $data['Hora'] ?></td>
                                                <td><?php echo $data['Tcobro'] ?></td>


                                                <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2  || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 6) { ?>
                                                    <td>
                                                        <a href="../View/modificarMedico.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-info" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px  rgba(0, 0, 0, 0.25);"><i class="typcn typcn-edit"></i></a>
                                                    </td>
                                                <?php } ?>


                                                <?php if ($_SESSION['rol'] == 1) { ?>
                                                    <td>
                                                        <a href="../View/credencialesMedico.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px  rgba(0, 0, 0, 0.25);"><i class="typcn typcn-user-add" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                <?php } ?>

                                                <?php if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 6) { ?>
                                                    <td>
                                                        <a href="#" onclick="permisoAuto()" class="btn btn-outline-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px  rgba(0, 0, 0, 0.25);"><i class="typcn typcn-user-add"></i></a>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <button class="btn btn-outline-danger" onclick="EliminarDoctor('<?php echo $data['id'] ?>')"><i class="typcn typcn-user-delete" aria-hidden="true"></i></button>

                                                </td>
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

            <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
            <script src="../assets/js/sweetalert2.min.js"></script>
            <script src="../assets/js/core/popper.min.js"></script>
            <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
            <script src="../assets/js/Medicos/medicos.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {

                    $('#btnEditarPass').click(function() {
                        /* Act on the event */
                        EliminarDoctor();
                    });
                });
            </script>
            <!--Srcip para vaildar el boton de Usuarios-->
            <script>
                function permisoAuto() {
                    Swal.fire({
                        /*toast: true,*/
                        position: 'center',
                        title: 'Mensaje del Sistema !',
                        text: 'No posee el permiso para eliminar un Medico',
                        footer: 'Contactar con el administrador del sistema!',
                        imageUrl: '../assets/images/logo.png',
                        imageWidth: 300,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        timer: 5000,

                    })
                }
            </script>


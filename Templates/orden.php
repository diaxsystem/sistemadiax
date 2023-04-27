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
                            <h5 class="text-black text-capitalize ps-3">Registrar Paciente :</h5>
                        </div>


                        <form role="form" method="POST" action="">

                            <div class="form-check form-check-info text-start ps-0">

                            </div>

                            <div class="input-group input-group-outline mb-3">
                                <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Ingrese la cedula del Paciente">
                            </div>

                            <div class="input-group input-group-outline mb-3">
                                <button type="text" class="btn btn-outline-primary">Comenzar</button>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="table-responsive" id="tablaResultado">
                                    <?php
                                    require_once('../Models/conexion.php');
                                    if (!empty($_POST)) {

                                        // resaltamos el resultado
                                        function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>')
                                        {
                                            return ($string !== '' && $frase !== '')
                                                ? preg_replace('/(' . preg_quote($frase, '/') . ')/i' . ('true' ? 'u' : ''), $taga . '\\1' . $tagb, $string)
                                                : $string;
                                        }


                                        $aKeyword = explode(" ", $_POST['cedula']);
                                        $filtro = "WHERE cedula LIKE LOWER('%" . $aKeyword[0] . "%'))";
                                        $query = "SELECT u.id_usuario,u.cedula,u.nombre,u.fecha_nac FROM usuario u WHERE cedula LIKE LOWER('%" . $aKeyword[0] . "%') ";


                                        for ($i = 1; $i < count($aKeyword); $i++) {
                                            if (!empty($aKeyword[$i])) {
                                                $query .= " OR cedula LIKE '%" . $aKeyword[$i] . "%' ";
                                            }
                                        }

                                        $result = $conection->query($query);
                                        $numero = mysqli_num_rows($result);
                                        if (!isset($_POST['cedula'])) {
                                            echo "Has buscado la palabra:<b> " . $_POST['cedula'] . "</b>";
                                        }

                                        if (mysqli_num_rows($result) > 0 and $_POST['cedula'] != '') {
                                            $row_count = 0;
                                            echo "<div class = 'col-12'>";
                                            echo "<br>Resultados encontrados:<b> " . $numero . "</b>";
                                            echo "<br><br><table class='table table-striped'>";
                                            while ($row = $result->fetch_assoc()) {
                                                $row_count++;
                                                echo "<tr><td>" . $row_count . " </td><td>" . resaltar_frase($row['cedula'], $_POST['cedula']) . "</td><td>" . resaltar_frase($row['nombre'], $_POST['cedula']) . "</td>" .
                                                    "<td>" . " </td><td>" . resaltar_frase($row['fecha_nac'], $_POST['cedula']) . "</td><td>" . '<a href="registro.php?id=' . $row['id_usuario'] . ' " class="btn btn-outline-primary" ><i class="fa fa-user-edit"></i> Cargar Orden</a>' .  "</td></tr>";
                                            }
                                            echo "</table>";
                                            echo "</div>";
                                        } else {
                                            if ($numero == 0) {
                                                echo "<div class = 'col-12'>";
                                                echo '<div class="btn btn-outline-primary btn-lg w-100 mt-4 mb-0">';
                                                echo ' <p >';
                                                echo 'No hay ningún nro de cedula con ese valor.';

                                                echo '</p>';
                                                echo '</div>';

                                                echo '<div class="input-group input-group-outline mb-3">';
                                                echo '<a href="../View/agregarCliente.php" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" >Registrar Paciente <i class="material-icons opacity-10"></i></a>';
                                                echo '</div>';
                                            } else {
                                                $row_count = 0;
                                                echo "<br>Resultados encontrados:<b> " . $numero . "</b>";
                                                echo "<br><br><table class='table table-striped'>";
                                                while ($row = $result->fetch_assoc()) {
                                                    $row_count++;
                                                    echo "<tr><td>" . $row_count . " </td><td>" . resaltar_frase($row['nombre'], $_POST['cedula']) . "</td><td>" . resaltar_frase($row['Apellido'], $_POST['cedula']) . "</td></tr>";
                                                }
                                                echo "</table>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            //mostramos todos los resultados




                                        }
                                    }
                                    ?>


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
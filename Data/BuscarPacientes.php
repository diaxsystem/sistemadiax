<?php



require_once("../Models/conexion.php");


$cedula = $_POST['inputCedula'];
$nombre = $_POST['inptudNombre'];


if ($cedula && empty($nombre)) {
    $sql = mysqli_query($conection, "SELECT u.idusuario,u.cedula,u.nombre,u.correo,u.fecha_nac,u.telefono,u.sexo
    FROM usuarios u  where u.cedula LIKE '".$cedula."' AND u.estatus = 1;");
} else {

    $sql = mysqli_query($conection, "SELECT u.idusuario,u.cedula,u.nombre,u.correo,u.fecha_nac,u.telefono,u.sexo
    FROM usuarios u   where u.nombre LIKE '".$nombre."' AND u.estatus = 1;");
}


$resultado = mysqli_num_rows($sql);


if($resultado = 0){
    echo '<div class="msg-win">No hay paciente con esos Datos.</div>'; 
}


while ($data = mysqli_fetch_array($sql)) {
    echo '
    <div class="col-12 mx-auto">
        <div class="card-body">
          <table class = "table table-striped">
          <thead class="text-center">
          <tr >      
            
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Sexo</th>                                                                                          
            <th>Fecha de Nacimiento</th>    
            <th>Actualizar</th>                           
          </tr>
        </thead>
        <tbody class="text-center">
            <tr>

            <td>' . $data['cedula'] . '</td>
            <td>' . $data['nombre'] . '</td>
            <td>' . $data['telefono'] . '</td>
            <td>' . $data['sexo'] . '</td>
            <td>' . $data['fecha_nac'] . '</td>
            <td>'.
             '<a href="../View/modificarPaciente.php?id='. $data['idusuario'].' "
              class="btn btn-outline-primary" ><i class="fa fa-user-edit"></i> Actualizar</a>' .  '</td>
            </tr>
          </tbody>

          </table>
        </div>
      </div>
  ';
}

?>

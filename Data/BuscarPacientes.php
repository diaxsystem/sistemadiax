<?php



require_once("../Models/conexion.php");


$cedula = trim($_POST['inputCedula']);
$nombre = $_POST['inptudNombre'];


if ($cedula && empty($nombre)) {
  
    $sql = mysqli_query($conection, "SELECT c.id,c.Cedula,c.Nombre,c.Apellido,c.Celular,c.Sexo,c.Nacimiento 
    FROM clientes c WHERE  c.cedula LIKE '%".$cedula."%' ");

} else if($nombre && empty($cedula)){


    $sql = mysqli_query($conection, "SELECT c.id,c.Cedula,c.Nombre,c.Apellido,c.Celular,c.Sexo,C.Nacimiento 
    FROM clientes c where c.Nombre LIKE '%$nombre%' ");
  
}



$resultado = mysqli_num_rows($sql);


if($resultado == 0){
    echo '<div class="alert alert-danger text-center">No hay paciente con esos Datos.</div>'; 
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

            <td>' . $data['Cedula'] . '</td>
            <td>' . $data['Nombre'] . '</td>
            <td>' . $data['Celular'] . '</td>
            <td>' . $data['Sexo'] . '</td>
            <td>' . $data['Nacimiento'] . '</td>
            <td>'.
             '<a href="../View/modificarPaciente.php?id='. $data['id'].' "
              class="btn btn-outline-primary" ><i class="fa fa-user-edit"></i> Actualizar</a>' .  '</td>
            </tr>
          </tbody>

          </table>
        </div>
      </div>
  ';
}

?>

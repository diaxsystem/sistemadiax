<?php



require_once("../Models/conexion.php");


$cedula = trim($_POST['inputCedula']);


if ($cedula) {
  
    $sql = mysqli_query($conection, "SELECT c.id,c.Cedula,c.Nombre,c.Apellido,c.Celular,c.Sexo,c.Nacimiento 
    FROM clientes c WHERE  c.cedula LIKE '%".$cedula."%' ");

} 



$resultado = mysqli_num_rows($sql);


if($resultado == 0){
    echo '<div class="btn btn-outline-primary btn-lg w-100 mt-4 mb-0">';
    echo ' <p >';
    echo 'No hay ningún nro de cedula con ese valor.';
    echo '</p>';
    echo '</div>';
    echo '<div class="input-group input-group-outline mb-3">';
    echo '<a href="../View/agregarCliente.php" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" >Registrar Paciente <i class="material-icons opacity-10"></i></a>';
    echo '</div>';
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
             '<a href="../Templates/registro.php?id='. $data['id'].' "
              class="btn btn-outline-primary" ><i class="fa fa-user-edit"></i> Registrar</a>' .  '</td>
            </tr>
          </tbody>

          </table>
        </div>
      </div>
  ';
}

<?php
//echo 'Hola desde el buscador';
//print_r($_POST);
session_start();
require_once("../Modelos/conexion.php");


$fecha_desde = '';
$fecha_hasta  = '';


$hoy = date("m-Y");

$anio = date("Y");


if (empty($_POST['fecha_desde']) && empty($_POST['fecha_hasta']) ) {

 //echo  $hoy.''.$estudio;
 //exit();

  $sql = mysqli_query($conection,"SELECT Estudio,count(*) as micontador FROM historial 
  WHERE  Fecha LIKE '%".$hoy."%' AND Fecha LIKE '%".$hoy."%' group BY Estudio order by micontador");
  //$rtotal=0;

}else if(!empty($_POST['fecha_desde']) && !empty($_POST['fecha_hasta']) ){ 
    $fecha_desde = date_create($_POST['fecha_desde']);
    $fecha_hasta = date_create($_POST['fecha_hasta']);

    $desde = date_format($fecha_desde, 'd-m-Y');
    $hasta  = date_format($fecha_hasta, 'd-m-Y');
       
   $sql = mysqli_query($conection,"SELECT Estudio,count(*) as micontador FROM historial 
   WHERE  Fecha BETWEEN '$desde' AND '$hasta' AND Fecha LIKE '%".$hoy."%' group BY Estudio order by micontador");
}


echo ' 

<thead>
      <tr class="text-center">      
        <th>Estudio</th>
        <th>Cantidad</th>
                                   
      </tr>
    </thead>
    <tbody>';
    $total = 0;

  while ($data = mysqli_fetch_array($sql)){
        $multiplicacion=$data['Monto']*$data['micontador'];;
    echo '<tr>
             <td>'. $data['Estudio']. '</td>
             <td class="text-center">'. $data['micontador']. '</td>
             

        </tr>';
  }
  echo
  $total=$total+$multiplicacion;
  $total= number_format($total, 3, '.', '.');
  '</tbody>
  <tfoot>
    <tr>
      <td><b>Cantidad Total : </b></td>
        
      <td class="text-center alert alert-success">'.$total.'</td>
      
      
    </tr>
  </tfoot>
   </table>';
?>

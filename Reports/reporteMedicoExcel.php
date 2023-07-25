<?php


session_start();
require_once('../vendor/autoload.php');
require_once("../Models/conexion.php");

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$medico = '';
$fecha_desde = '';
$fecha_hasta  = '';
if (empty($_POST['fecha_desde']) || empty($_POST['fecha_hasta']) || empty($_POST['medico'])) {

  echo '<div class="alert alert-danger" role="alert">
    Debes seleccionar los parametros a buscar

  </div>';
  exit();
}

if (!empty($_REQUEST['fecha_desde']) && !empty($_REQUEST['fecha_hasta']) || !empty($_REQUEST['medico'])) {
  $fecha_desde = date_create($_REQUEST['fecha_desde']);
  $desde = date_format($fecha_desde, 'd-m-Y');


  $fecha_hasta = date_create($_REQUEST['fecha_hasta']);
  $hasta = date_format($fecha_hasta, 'd-m-Y');

  $medico = trim($_POST['medico']);

  $buscar = '';
  $where = '';
}
if ($desde > $hasta) {
  echo $alert = '<p class = "alert alert-danger">La Fecha de Inicio de la busqueda debe ser mayor a la del final</p>';
  exit();
} else if ($desde == $hasta) {

  $where = "Fecha LIKE '%$desde%' AND Atendedor LIKE '%$medico%'";

  $buscar = "fecha_desde=$desde&fecha_hasta=$hasta AND Atendedor LIKE '%$medico%' ";
} else {
  $f_de = $desde . '-00:00:00';
  $f_a  = $hasta . '-23:00:00';
  $where = "Fecha BETWEEN '$f_de' AND '$f_a' AND Atendedor LIKE '%$medico%' ";
  $buscar = "fecha_desde=$desde&fecha_hasta=$hasta AND Atendedor LIKE '%$medico%'";
}

$anio = date_create($_REQUEST['fecha_desde']);
$hoy = date_format($anio, 'm-Y');

$sql = "SELECT h.id,c.nombre,c.apellido,h.Estudio,h.Cedula,h.Atendedor,h.Fecha,h.Seguro,h.Monto,h.Descuento,h.MontoS,h.Comentario, h.fecha_2 
        FROM historial h inner join clientes c on c.cedula = h.cedula  where $where and Fecha like '%" . $hoy . "%' ORDER BY  h.id ASC";

$resultado = mysqli_query($conection, $sql);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle('Reporte de Contabilidad');

$hojaActiva->setCellValue('A1', 'Fecha');
$hojaActiva->setCellValue('B1', 'Nombre y Apellido');
$hojaActiva->setCellValue('C1', 'Cedula');
$hojaActiva->setCellValue('D1', 'Estudio');
$hojaActiva->setCellValue('E1', 'Doctor/a');
$hojaActiva->setCellValue('F1', 'Seguro');
$hojaActiva->setCellValue('G1', 'Monto');
$hojaActiva->setCellValue('H1', 'Monto Seguro');
$hojaActiva->setCellValue('I1', 'Descuento');
$hojaActiva->setCellValue('J1', 'Comentario');


$fila = 2;

while ($rows = $resultado->fetch_assoc()) {
  $hojaActiva->setCellValue('A' . $fila, $rows['Fecha']);
  $hojaActiva->setCellValue('B' . $fila, $rows['nombre'].' '.$rows['apellido']);
  $hojaActiva->setCellValue('C' . $fila, $rows['Cedula']);
  $hojaActiva->setCellValue('D' . $fila, $rows['Estudio']);
  $hojaActiva->setCellValue('E' . $fila, $rows['Atendedor']);
  $hojaActiva->setCellValue('F' . $fila, $rows['Seguro']);
  $hojaActiva->setCellValue('G' . $fila, number_format((int)$rows['Monto'], 1, '.', '.'));
  $hojaActiva->setCellValue('H' . $fila, number_format((int)$rows['MontoS'], 1, '.', '.'));
  $hojaActiva->setCellValue('I' . $fila, number_format((int)$rows['Descuento'], 1, '.', '.'));
  $hojaActiva->setCellValue('J' . $fila, $rows['Comentario']);
  $fila++;
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte-medicos.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

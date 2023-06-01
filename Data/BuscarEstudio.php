<?php

require_once('../Models/conexion.php');
#$medico=$_POST['medico'];

$medico = trim($_POST['medico']);
$fecha= date("m-Y")."-2017";
echo "<h3>Resumen de Estudios</h3>";

echo "<table border='1'>
<tr>
<th>Estudio</th>
<th>Cantidad</th>
</tr>";
$result3 = mysqli_query($conection,"select Estudio,count(*) as micontador from historial where Fecha like '%$fecha%' group BY Estudio order by micontador");
$rtotal=0;
while($row = mysqli_fetch_array($result3))
{
$multiplicacion=$row['Monto']*$row['micontador'];
        echo "<tr>";
        echo "<td><font size='2'>" . $row['Estudio'] . "</td>";
        echo "<td><font size='2'>" . $row['micontador'] . "</td>";
       # echo "<td><font size='2'>" . $row['Monto'] . "</td>";
       # echo "<td><font size='2'>" . number_format($row['Monto']*$row['micontador'], 3, '.', '.') . "</td>";
        echo "</tr>";
        $rtotal=$rtotal+$multiplicacion ;
}
$rtotal= number_format($rtotal, 3, '.', '.');

echo "</table>";

mysqli_close($con);
?>

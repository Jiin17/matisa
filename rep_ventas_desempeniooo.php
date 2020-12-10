<?php 
include("libreria.php");
$cnx=conectar();

$orte=mysql_query("SELECT idempleado,nombre,apellido FROM empleado");
while ($gt=mysql_fetch_array($orte)) {
	# code...
	echo "<b>$gt[1] $gt[2]</b>";

$usu=mysql_query("SELECT v.fecha_venta,a.chasis,v.estado,v.tipo_venta,v.precio_venta,v.antisipo,v.saldo,v.tipo_de_cambio
	FROM ventas v INNER JOIN automovil a ON a.idautomovil=v.idautomovil
	INNER JOIN empleado e ON e.idempleado=v.idempleado
	WHERE v.fecha_venta>='$fechini' AND v.fecha_venta<='$fechfin' AND e.idempleado='$gt[0]'");
 ?>

			<div class="table-responsive">
			  <table width="100%" border="2">
	<tr>
		<th rowspan='2'>FECHA</th>
		<th rowspan='2'>CHASIS VEHIVULO</th>
		<th rowspan='2'>ESTADO</th>
		<th rowspan='2'>TIPO DE VENTA</th>
		<th colspan='2'>PRECIO DE VENTA</th>
		<th colspan='2'>ANTICIPO</th>
		<th colspan='2'>SALDO</th>
		<th rowspan='2'>T.C.</th>
	</tr>
	<tr>
		<th>Bs.</th><th>$</th>
		<th>Bs.</th><th>$</th>
		<th>Bs.</th><th>$</th>
	</tr>
<?php 
while ($hu=mysql_fetch_array($usu)) {
	# code...
$dolprecio=round($hu[4]/$hu[7],2);
$dolabti=round($hu[5]/$hu[7],2);
$dolsaldo=round($hu[6]/$hu[7],2);
	echo "
<tr>
<td>$hu[0]</td>
<td>$hu[1]</td>
<td>$hu[2]</td>
<td>$hu[3]</td>
<td>$hu[4]</td>
<td>$dolprecio</td>
<td>$hu[5]</td>
<td>$dolabti</td>
<td>$hu[6]</td>
<td>$dolsaldo</td>
<td>$hu[7]</td>
</tr>
	";
}
 ?>
</table>
	<br>
<?php 
}
$hda=mysql_query("SELECT count(e.idempleado),e.nombre
	FROM empleado e INNER JOIN ventas v ON v.idempleado=e.idempleado
	WHERE v.fecha_venta>='$fechini' AND v.fecha_venta<='$fechfin'
	GROUP BY e.idempleado
	");

$porciento=0;
while ($toy=mysql_fetch_array($hda)) {
$porciento=$porciento+$toy[0];
}
$gth=mysql_query("SELECT count(e.idempleado),e.nombre,e.apellido
	FROM empleado e INNER JOIN ventas v ON v.idempleado=e.idempleado
	WHERE v.fecha_venta>='$fechini' AND v.fecha_venta<='$fechfin'
	GROUP BY e.idempleado
	");

echo "
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'> RANKING DE VENTAS</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        </button>
      </div>
      <div class='modal-body'>
";
while ($hy=mysql_fetch_array($gth)) {
	# code...
	$toal=($hy[0]*100)/$porciento;

	echo "<h5>$hy[1] $hy[2] CON $hy[0] VENTA/S</h5>";
	echo "
<div class='progress'>
  <div class='progress-bar' role='progressbar' style='width: $toal%' aria-valuenow='$toal' aria-valuemin='0' aria-valuemax='100'></div>
</div>
	";
}

echo "
      </div>
    </div>
  </div>
";
 ?>

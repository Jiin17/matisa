<?php 
include("libreria.php");
$cnx=conectar();

$usu=mysql_query("SELECT v.fecha_venta,a.chasis,v.estado,v.tipo_venta,v.precio_venta,v.antisipo,v.saldo,v.tipo_de_cambio
	FROM ventas v INNER JOIN automovil a ON a.idautomovil=v.idautomovil
	INNER JOIN empleado e ON e.idempleado=v.idempleado
	WHERE v.fecha_venta>='$fechini' AND v.fecha_venta<='$fechfin'");
 ?>
	<br>
	<br>
			<div class="table-responsive">
			  <table class="table table-bordered">
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
<?php 

 ?>

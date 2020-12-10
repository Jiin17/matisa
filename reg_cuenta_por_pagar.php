<?php 
include("libreria.php");
$cnx=conectar();
if ($detalle=="" OR $num_recibo=="" OR $costodes=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO cuenta_por_pagar(detalle,num_recibo,fecha_a_pagar,monto, garantia, fecha_registro,tipo_cambio,num_contrato,idempleado) 
		     VALUES('$detalle','$num_recibo','$fecha_apagar','$costodes','$garantia','$fecha_registro','$tipo_cambiodes','$num_contrato','$idempleado')");

	if ($datos) {

?>
 <table class="table table-bordered">
  <tr>
    <th colspan="6"><h2>INGRESO/S</h2></th>
  </tr>
  <tr>
    <th rowspan="2">FECHA</th>
    <th rowspan="2">DETALLE</th>
    <th rowspan="2">ENTIDAD FINANCIERA</th>
    <th colspan="2">MONTO</th>
    <th rowspan="2">T.C.</th>
  </tr>
  <tr>
    <th>Bs.</th>
    <th>$</th>
  </tr>
<?php 
$jsj=mysql_query("SELECT t.fecha,t.detalle,d.descripcion,t.monto,t.tipocambio
  FROM transaccion_bancos  t INNER JOIN entidad_bancaria d ON t.identidad_bancaria=d.identidad_bancaria 
  WHERE t.tipo='INGRESO'");
while ($y=mysql_fetch_array($jsj)) {
  # code...
  $total=$total+$y[3];
$dol=round($y[3]/$y[4],2);
echo "<tr>
<td>$y[0]</td>
<td>$y[1]</td>
<td>$y[2]</td>
<td>$y[3]</td>
<td>$dol</td>
<td>$y[4]</td>
</tr>";
}
echo "<th colspan='6'><center><h4>TOTAL INGRESO: $total Bs.</h4></center></th>";
 ?>
</table>

 <table class="table table-bordered">
  <tr>
    <th colspan="6"><h2>EGRESO/S</h2></th>
  </tr>
  <tr>
    <th rowspan="2">FECHA</th>
    <th rowspan="2">DETALLE</th>
    <th rowspan="2">ENTIDAD FINANCIERA</th>
    <th colspan="2">MONTO</th>
    <th rowspan="2">T.C.</th>
  </tr>
  <tr>
    <th>Bs.</th>
    <th>$</th>
  </tr>
<?php 
$jsj=mysql_query("SELECT t.fecha,t.detalle,d.descripcion,t.monto,t.tipocambio
  FROM transaccion_bancos  t INNER JOIN entidad_bancaria d ON t.identidad_bancaria=d.identidad_bancaria  
  WHERE t.tipo='EGRESO'");
while ($y=mysql_fetch_array($jsj)) {
  # code...
  $totalere=$totalere+$y[3];
$dol=round($y[3]/$y[4],2);
echo "<tr>
<td>$y[0]</td>
<td>$y[1]</td>
<td>$y[2]</td>
<td>$y[3]</td>
<td>$dol</td>
<td>$y[4]</td>
</tr>";
}
echo "<th colspan='6'><center><h4>TOTAL EGRESO: $totalere Bs.</h4></center></th>";
 ?>
</table>

 <table class="table table-bordered">
  <tr>
    <th colspan="6"><h5>SALDO ACTUAL: <?php $fecha=date("d-m-Y"); echo "$fecha"; ?></h5></th>
  

<?php 
$totalerel=$total-$totalere;
echo "<th colspan='6'><center><h4> $totalerel Bs.</h4></center></th></tr>";
 ?>
</table>
<?php



	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>

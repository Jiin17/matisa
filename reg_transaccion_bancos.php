<?php 
include("libreria.php");
$cnx=conectar();
if ($fecha_des=="" OR $costodes=="" OR $tipo_cambiodes=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO transaccion_bancos(detalle,fecha,monto,tipocambio,tipo,idempleado,identidad_bancaria) 
		     VALUES('$num_recibo','$fecha_des','$costodes','$tipo_cambiodes','$tipo','$idempleado','$idtransaccion')");
	if ($tipo=='INGRESO') {
		$consul=mysql_query("SELECT detalle FROM saldo_banco where idsaldo_banco='1'");
		$contor=mysql_fetch_array($consul);
		$contor=$contor[0]+$costodes;
		$cambio=mysql_query("UPDATE saldo_banco set detalle='$contor' where idsaldo_banco='1'",$cnx);
	}else{
		$consul=mysql_query("SELECT detalle FROM saldo_banco where idsaldo_banco='1'");
		$contor=mysql_fetch_array($consul);
		$contor=$contor[0]-$costodes;
		$cambio=mysql_query("UPDATE saldo_banco set detalle='$contor' where idsaldo_banco='1'",$cnx);		
	}

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

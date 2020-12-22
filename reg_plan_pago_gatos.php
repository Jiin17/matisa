<?php 
include("libreria.php");
$cnx=conectar();
if ($fecha_plan_pago=="" OR $mostoplanpago=="" OR $tipo_cambiopalpago=="" OR $cantmeses=="" OR $interespa=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO plan_pagos(fecha,nomto,tipo_cambio,cantidad_meses,interes,idventas) 
		     VALUES('$fecha_plan_pago','$mostoplanpago','$tipo_cambiopalpago','$cantmeses','$interespa',1000)");
  $ms=mysql_insert_id();
	if ($datos) {

$cnue=mysql_query("SELECT fecha,nomto,cantidad_meses,interes,idplan_pagos FROM plan_pagos WHERE idplan_pagos=$ms ");
$num=mysql_fetch_array($cnue);
$fecha=$num[0];
$monto=$num[1];
$cantmeses=$num[2];
$interes=$num[3];
$idplan_pagos=$num[4];

$intere=($interes/12)/100;
$costo=round(($intere*$monto)/(1-(pow((1/(1+$intere)),$cantmeses))),2);

echo "<input type='hidden' value='$idplan_pagos' id='idpiesaplan'>";
?>
<table class="table table-bordered sm">
  <tr>
    <th>N° CUOTA</th><th>FECHA</th><th>SALDO CAPITAL (Bs.)</th><th>PAGO CAPITAL (Bs.)</th><th>PAGO INTERES (Bs.)</th><th>TOTAL CUOTA (Bs.)</th>
  </tr>
  <?php 
for ($i=0; $i < $cantmeses ; $i++) { 
    $numa=$i+1;
    $interes=round($monto*$intere,2);
    $pago=round($costo-$interes,2);
    echo "<tr>
        <td>$numa</td>
        <td>$fecha</td>
        <td>$monto</td>
        <td>$pago</td>
        <td>$interes</td>
        <td>$costo</td>
    </tr>";
    $fecha=date("Y-m-d",strtotime($fecha."+ 1 month")); 
    $monto=round($monto-$pago,2);
}

   ?>
</table>
<?php
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>
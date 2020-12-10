<?php 
include("libreria.php");
$cnx=conectar();
if ($tipo_cambiodes=="" OR $costodes=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO pago(fecha,nomto,detalle,tipo_cambio,idplan_pagos) 
		     VALUES('$fecha','$costodes','$detalle','$tipo_cambiodes','$idplan_pago')");
	$consula=mysql_query("SELECT v.saldo,v.idventas FROM ventas v INNER JOIN plan_pagos pp ON v.idventas=pp.idventas WHERE pp.idplan_pagos='$idplan_pago' group by v.idventas ");
	while ($hy=mysql_fetch_array($consula)) {
		$saldo=$hy[0]-$costodes;
		$idventas=$hy[1];
	}
		$cambio=mysql_query("UPDATE ventas set saldo='$saldo' where idventas='$idventas'",$cnx);
		
	if ($saldo==0) {
		$cambio=mysql_query("UPDATE ventas set 	estado='CONCLUIDO' where idventas='$idventas'",$cnx);
	}
	if ($datos) {
    	// echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
    	echo "
        <td><a href='rep_recibo_de_pago.php?idplan_pago=$idplan_pago' class='btn btn-success' target='_blank'>IMPRIMIR RECIBO</a></td>
        <td><a href='cliente.php' class='btn btn-warning'>FINALIZAR</a></td>

    	";
		// echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=cliente.php'>";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>
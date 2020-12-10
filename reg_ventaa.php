<?php 
session_start();
$idempleado=$_SESSION['idempleado'];
include("libreria.php");
$cnx=conectar();
if ($cod_cli=="" OR $precio_venta=="" OR $tipo_cambio=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	if ($saldo!=0) {
		$estado='INCOMPLETO';
	}else{
		$estado='COMPLETADO';
	}
	$datos=mysql_query("INSERT INTO ventas(cod_cli,precio_venta,fecha_venta,tipo_venta,estado,saldo,antisipo,garantia,entidad_financiera,tipo_de_cambio,idempleado,idcliente,idautomovil) 
		     VALUES('$cod_cli','$precio_venta','$fecha_venta','$tipo_venta','$estado','$saldo','$antisipo','$garantia','$entidad_financiera','$tipo_cambio','$idempleado','$idcliente','$idautomovil')");
    $cambio=mysql_query("UPDATE automovil set estado='VENDIDO' where idautomovil='$idautomovil'",$cnx);

	if ($datos) {
    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=cliente.php'>";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>
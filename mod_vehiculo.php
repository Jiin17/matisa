<?php
include("libreria.php");
$cnx=conectar();

$cambio=mysql_query("UPDATE automovil set idautomovil='$idautomovil',	chasis='$chasis',	num_motor='$num_motor',	color='$color',	modelo='$modelo',	precio_proforma='$precio_proforma',	cilindrada='$cilindrada',	anio='$anio',	traccion='$traccion',	idmarca='$idmarca',	idtipo_veiculo='$idtipo_vehiculo',	procedencia='$procedencia' where idautomovil='$idautomovil'",$cnx);

echo "<meta http-equiv='refresh' content='0; url=frm_detalla_autimovil.php?idautomovil=$idautomovil'>";
?>

<?php
include("libreria.php");
$cnx=conectar();

$cambio=mysql_query("UPDATE empleado set estado='ACTIVO' where idempleado='$idempleado'",$cnx);

echo "<meta http-equiv='refresh' content='0; url=frm_detalle_empleado.php?idempleado=$idempleado'>";
?>

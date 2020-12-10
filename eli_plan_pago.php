<?php 
include("libreria.php");
$cnx=conectar();

$sd=mysql_query("DELETE FROM plan_pagos WHERE idplan_pagos='$idplanpago'");
?>
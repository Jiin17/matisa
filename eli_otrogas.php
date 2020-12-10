<?php 
include("libreria.php");
$cnx=conectar();

$sd=mysql_query("DELETE FROM otrosgastos WHERE idotrosgastos='$idotrogas'");
?>
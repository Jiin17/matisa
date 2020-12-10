<?php 
include("libreria.php");
$cnx=conectar();

$sd=mysql_query("DELETE FROM desembolso WHERE iddesembolso='$iddesem'");
?>
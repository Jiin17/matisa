<?php 
include("libreria.php");
$cnx=conectar();
if ($ci=="" OR $nombre=="" OR $apellido=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO empleado(ci,nombre,apellido,telefono,celular,direccion,estado) 
		     VALUES('$ci-$cii','$nombre','$apellido','$telefono','$celular','$direccion','$estado')");
	if ($datos) {
    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=empleado.php'>";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>
<?php 
include("libreria.php");
$cnx=conectar();
if ($marca=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO marca(descripcion) 
		     VALUES('$marca')");
	if ($datos) {
    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=veiculo.php'>";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>

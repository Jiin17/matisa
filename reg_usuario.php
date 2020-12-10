<?php 
include("libreria.php");
$cnx=conectar();
if ($usuario=="" OR $contrasenia=="" OR $repcontrasenia=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	if ($contrasenia==$repcontrasenia) {
			$datos=mysql_query("INSERT INTO usuario(usuario,contrasenia,tipo_empleado,idempleado) 
				     VALUES('$usuario','$contrasenia','$tipo_empleado','$idempleado')");
			if ($datos) {
		    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
				echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=empleado.php'>";
			}else{
		    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
			}
	}else{
	echo "<div class='alert alert-danger' role='alert'>LAS CONTRASEÑAS NO COINCIDEN...!</div>";
	}
}

 ?>
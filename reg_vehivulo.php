    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<?php 
include("libreria.php");
$cnx=conectar();

$nombredearchivo=$HTTP_POST_FILES["foto"]["name"];
$idfotoper=$nombredearchivo;
$ruta="C:/AppServ/www/matisa3.0/imagesautos/".$idfotoper;
move_uploaded_file($HTTP_POST_FILES["foto"]["tmp_name"],$ruta);

if ($chasis=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO automovil(chasis,num_motor,color,modelo,estado,precio_proforma,foto,cilindrada,anio,traccion,idmarca,idtipo_veiculo,procedencia) 
		     VALUES('$chasis','$num_motor','$color','$modelo','LIBRE','$precio_proforma','$idfotoper','$cilindrada','$anio','$traccion','$idmarca','$idtipo_vehiculo','$procedencia')");
	if ($datos) {
    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=veiculo.php'>";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>

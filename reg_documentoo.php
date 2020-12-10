    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<?php 
include("libreria.php");
$cnx=conectar();
// echo "--> $descrip_doc --> $foto";

if ($descrip_doc=="" OR $foto=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
$nombredearchivo=$HTTP_POST_FILES["foto"]["name"];
$idfotoper=$nombredearchivo;
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$idfotoper;
move_uploaded_file($HTTP_POST_FILES["foto"]["tmp_name"],$ruta);


	$datos=mysql_query("INSERT INTO documento(descripcion,foto,ventas_idventas) 
		     VALUES('$descrip_doc','$idfotoper','$idventa')");
	if ($datos) {
    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=frm_venta_realizada_detalle.php?idventas=$idventa'>";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>

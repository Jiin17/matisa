<?php 
include("libreria.php");
$cnx=conectar();
session_start();
$idempleado=$_SESSION['idempleado'];
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
          <script language="JavaScript">
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ; 
} 
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}
</script>
</head>
<body onload="imprimir();">


    <div class="modal-content">
    	<div class="modal-header">
    		<h3>DETALLE AUTOMOVIL</h3>
		</div>
	<!-- </div> -->
    	<!-- </div> -->
    	<div class="modal-body">
			<div class="table-responsive">
			  <table class="table table-bordered">
<?php
$consul=mysql_query("SELECT *
					FROM automovil a INNER JOIN tipo_veiculo tv ON tv.idtipo_veiculo=a.idtipo_veiculo  
          INNER JOIN marca m ON m.idmarca=a.idmarca 
          WHERE idautomovil='$idautomovil'");
while ($th=mysql_fetch_array($consul)) {
 	echo "
     <tr><td colspan='2'><img src='imagesautos/$th[7]' width='350px'></td></tr>
 	   <tr><th>N° CHASIS</th>	 		<td>$th[1]</td></tr>
 	   <tr><th>N° MOTOR</th>	    <td>$th[2]</td></tr>
 	   <tr><th>MODELO</th>	      <td>$th[4]</td></tr>
 	   <tr><th>COLOR</th>		      <td>$th[3]</td></tr>
     <tr><th>ESTADO</th>        <td>$th[5]</td></tr>
     <tr><th>CILINDRADA</th>    <td>$th[8]</td></tr>
     <tr><th>AÑO</th>           <td>$th[9]</td></tr>
 	   <tr><th>TRACCION</th>	    <td>$th[10]</td></tr>
     <tr><th>MARCA</th>         <td>$th[17]</td></tr>
     <tr><th>TIPO VEHICULO</th> <td>$th[15]</td></tr>
";
 } 


?>
			  </table>
			</div>
    	</div>
    </div>
</body>
</html>
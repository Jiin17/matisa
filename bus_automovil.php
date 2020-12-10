<?php 
session_start();
$idempleado=$_SESSION['idempleado'];
include("libreria.php");
$cnx=conectar();
	$consulta1 = mysql_query("SELECT * FROM automovil 
                          WHERE chasis LIKE '%$valor%' or num_motor like'%$valor%'");
$filas = mysql_num_rows($consulta1);
if ($filas>0) {
echo "
			  <table class='table table-bordered'>
			    <tr>
			    	<th>SELECIONAR</th>
			    	<th>N° CHASIS</th>
			    	<th>N° MOTOR</th>
			    	<th>MODELO</th>
			    	<th>COLOR</th>
			    	<th>ESTADO</th>
			    </tr>";

while ($th=mysql_fetch_array($consulta1)) {
 	echo "
 	<tr>
       <td><a href='frm_detalla_autimovil.php?idautomovil=$th[0]' class='btn btn-primary'>VER</a></td>
 	   <td>$th[1]</td>
 	   <td>$th[2]</td>
 	   <td>$th[4]</td>
 	   <td>$th[3]</td>
 	   <td>$th[5]</td>
 	</tr>
 	";
 } 
echo "</table>";
}else{
echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
			  REGISTRAR NUEVO VEHICULO
			</button>";
}

 ?>
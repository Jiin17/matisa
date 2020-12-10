<?php 
session_start();
$idempleado=$_SESSION['idempleado'];
include("libreria.php");
$cnx=conectar();
	$consulta1 = mysql_query("SELECT * FROM cliente
                          WHERE cliente.nombre LIKE '%$valor%' or cliente.ci like'%$valor%'");
$filas = mysql_num_rows($consulta1);
if ($filas>0) {
echo "
		   <div class='table-responsive'>
			  <table class='table table-bordered'>
			    <tr>
			    	<th>SELECIONAR</th>
			    	<th>CI</th>
			    	<th>NOMBRE/S</th>
			    	<th>TELEFONO</th>
			    	<th>CELULAR</th>
			    </tr>";

while ($th=mysql_fetch_array($consulta1)) {
 	echo "
 	<tr>
       <td><a href='frm_detalla_cliente.php?idcliente=$th[0]' class='btn btn-primary'>VER</a></td>
 	   <td>$th[1]</td>
 	   <td>$th[2]</td>
 	   <td>$th[5]</td>
 	   <td>$th[6]</td>
 	</tr>
 	";
 } 
echo "</table></div>";
}else{
echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
			  REGISTRAR NUEVO CLIENTE
			</button>";
}

 ?>
<?php 
include("libreria.php");
$cnx=conectar();
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

</head>
<body>


  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h3>VENTA/S REALIZADA/S</h3>
		</div>
	<!-- </div> -->
    	<!-- </div> -->
    	<div class="modal-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th>SELECCIONAR</th>
            <th>FECHA DE VENTA</th>
            <th>TIPO DE VENTA</th>
            <th>ESTADO</th>
            <th>N° CHASIS</th>
            <th>DESCRIPCION</th>
          </tr>
<?php
$consul=mysql_query("SELECT v.fecha_venta,v.tipo_venta,v.estado,a.chasis,tv.descripcion,v.idventas
					FROM ventas v INNER JOIN automovil a ON v.idautomovil=a.idautomovil 
          INNER JOIN tipo_veiculo tv ON tv.idtipo_veiculo=a.idtipo_veiculo
          INNER JOIN cliente c ON c.idcliente=v.idcliente
          WHERE c.idcliente='$idcliente'");
while ($th=mysql_fetch_array($consul)) {
 	echo "
  <tr>
    <td><a href='frm_venta_realizada_detalle.php?idventas=$th[5]' class='btn btn-primary btn-lg'>VER</a></td>
    <td>$th[0]</td>
    <td>$th[1]</td>
    <td>$th[2]</td>
    <td>$th[3]</td>
    <td>$th[4]</td>
  </tr>
 	";
 } 
?>
			  </table>

			</div>
    	</div>
    </div>
  </div>




</body>
</html>

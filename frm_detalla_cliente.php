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
    <script type="text/javascript">
    $(document).ready(function (){
        $("#registrar_empleado").on("click", function (){
            $.ajax({ 
                url: 'reg_usuario.php', 
                data: 'usuario='+$("#usuario").val()+
                '&contrasenia='+$("#contrasenia").val()+
                '&repcontrasenia='+$("#repcontrasenia").val()+
                '&idempleado='+$("#idempleado").val()+
                '&tipo_empleado='+$("#tipo_empleado").val(), 
                success: function(resp){ 
                    $('#respuestaregistro').html(resp) 
                    } 
                });
        });
    });
    </script>

</head>
<body>


  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h3>CLIENTE</h3>
		</div>
	<!-- </div> -->
    	<!-- </div> -->
    	<div class="modal-body">
      <div class="table-responsive">
        <table class="table table-bordered">
<?php
$consul=mysql_query("SELECT *
					FROM cliente WHERE idcliente='$idcliente'");
while ($th=mysql_fetch_array($consul)) {
 	echo "
 	   <tr><th>CI</th>	 		  <td>$th[1]</td>
 	   <tr><th>NOMBRE/S</th>	<td>$th[2]</td>
 	   <tr><th>OCUPACION</th>	<td>$th[3]</td>
 	   <tr><th>DIRECCION</th>	<td>$th[4]</td>
 	   <tr><th>TELEFONO</th>	<td>$th[5]</td>
 	   <tr><th>CELULAR</th>		<td>$th[6]</td>
 	";
 } 
?>
			  </table>
<div class="table-responsive">
<table class="table table-bordered">
  <tr>

      <td>
<?php 
echo "<center><a href='frm_venta.php?idcliente=$idcliente' class='btn btn-primary btn-lg'>VENDER</a></center>";
?>
      </td>
      <td>
<?php 
echo "<center><a href='frm_venta_realizada.php?idcliente=$idcliente' class='btn btn-secondary btn-lg'>VENTAS</a></center>";
?>        
      </td>
  </tr>
</table>
</div>

			</div>
    	</div>
    </div>
  </div>




</body>
</html>



<!-- Modal REG EMPLEADO -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TIPO DE VENTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
<button type="button" class="btn btn-primary btn-lg">CREDITO</button>
<button type="button" class="btn btn-secondary btn-lg">DIRECTA</button>
        </center>
      </div>
      <div class="modal-footer">
        <div id="respuestaregistro"></div>
        <button type="button" id="registrar_empleado" class="btn btn-primary">GUARDAR</button>
      </div>
    </div>
  </div>
</div> -->
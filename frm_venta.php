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
        $("#gusradarmarca").on("click", function (){
            $.ajax({ 
                url: 'reg_marca.php', 
                data: 'marca='+$("#marca").val(), 
                success: function(resp){ 
                    $('#respuesta_marcva').html(resp) 
                    } 
                });
        });
    });

    </script>

    <script type="text/javascript">
    $(document).ready(function (){
        $("#gusradartipo").on("click", function (){
            $.ajax({ 
                url: 'reg_tipo_marcaa.php', 
                data: 'tipo_marca='+$("#tipo_marca").val(), 
                success: function(resp){ 
                    $('#respuesta_tipo').html(resp) 
                    } 
                });
        });
    });

    </script>

    <script type="text/javascript">
    $(document).ready(function (){
        $("#registro_tood").on("click", function (){
            $.ajax({ 
                url: 'reg_vehivulo.php', 
                data: 'chasis='+$("#chasis").val()+
                '&num_motor='+$("#num_motor").val()+
                '&color='+$("#color").val()+
                '&modelo='+$("#modelo").val()+
                '&estado='+$("#estado").val()+
                '&precio_proforma='+$("#precio_proforma").val()+
                '&idmarca='+$("#idmarca").val()+
                '&foto='+$("#foto").val()+
                '&anio='+$("#foto").val()+
                '&foto='+$("#foto").val()+
                '&idtipo_vehiculo='+$("#idtipo_vehiculo").val(), 
                success: function(resp){ 
                    $('#respuestado_todo').html(resp) 
                    } 
                });
        });
    });

    </script>

    <?php 
echo "
  <script type='text/javascript'>
function busca() {
              var texto = $('input#busquedacli').val();

              if (texto != '') {
                  $.post('bus_automovil_venta.php?idcliente=".$idcliente."', {valor: texto}, function(mensaje) {
                      $('#respuesta').html(mensaje);
                  }); 
              } else { 
                  ('#respuesta').html('');
            };
          };
     </script>
";
     ?>
</head>
<body>

<!-- <img src="imagesautos/fondo.jpg"> -->


  <div class="modal-dialog modal-lg">
    <div class="modal-content">
<h3><CENTER>VENTA VEHICULO</CENTER></h3>
        <table class="table table-bordered">
<?php
$consul=mysql_query("SELECT *
          FROM cliente WHERE idcliente='$idcliente'");
while ($th=mysql_fetch_array($consul)) {
  echo "
     <tr><th>CI</th>        <td>$th[1]</td></tr>
     <tr><th>NOMBRE/S</th>  <td>$th[2]</td></tr>
  ";
 } 
?>
        </table>

    	<div class="modal-header">
    		<h3>BUSCAR VEHICULO:</h3>
		</div>
      <div class="modal-body">
	      <div class="form-group">
		    <label for="exampleFormControlInput1">INGRESAR N° DE CHASIS/ N° MOTOR:</label>
		    <input type="text" class="form-control" onKeyUp="busca();" id="busquedacli" placeholder="Ingresar Num Chasis/Num Motor" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
      </div>

    	<div class="modal-body" id="respuesta">
			<div class="table-responsive">

			</div>
    	</div>
    </div>
  </div>






</body>
</html>
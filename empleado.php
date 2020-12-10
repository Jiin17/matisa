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
                url: 'reg_empleado.php', 
                data: 'ci='+$("#ci").val()+
                '&cii='+$("#cii").val()+
                '&nombre='+$("#nombre").val()+
                '&apellido='+$("#apellido").val()+
                '&telefono='+$("#telefono").val()+
                '&celular='+$("#celular").val()+
                '&direccion='+$("#direccion").val()+
                '&estado='+$("#estado").val(), 
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
    		<h3>LISTA DE EMPLEADOS</h3>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  REGISTRAR NUEVO EMPLEADO
			</button>
		</div>
	<!-- </div> -->
    	<!-- </div> -->
    	<div class="modal-body">
			<div class="table-responsive">
			  <table class="table table-bordered">
			    <tr>
			    	<th>SELECCIONAR</th>
			    	<th>CI</th>
			    	<th>NOMBRE/S</th>
			    	<th>TELEFONO</th>
			    	<th>CELULAR</th>
			    </tr>
<?php
$consul=mysql_query("SELECT ci,nombre,apellido,telefono,celular,idempleado FROM empleado");
while ($th=mysql_fetch_array($consul)) {
 	echo "
 	<tr>
       <td><a href='frm_detalle_empleado.php?idempleado=$th[5]' class='btn btn-primary'>VER</a></td>
 	   <td>$th[0]</td>
 	   <td>$th[1] $th[2]</td>
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


<!-- Modal REG EMPLEADO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form>
			<div class="form-group">
			    <label>C.I.</label>
			        <div class="input-group">
			            <input type="number" class="form-control" id="ci" autocomplete="off" placeholder="Ingresar CI">
			            <span class="input-group-btn">
			            <select class="btn btn-outline-secondary" name="cii" id="cii">
			              <option>OR</option>
			              <option>LP</option>
			              <option>SC</option>
			              <option>CB</option>
			              <option>PD</option>
			              <option>BN</option>
			              <option>PT</option>
			              <option>TR</option>
			              <option>CH</option>
			            </select>
			            </span>
			        </div>
			</div>

		  <div class="form-group">
		    <label for="exampleFormControlInput1">APELLIDO/s</label>
		    <input type="text" class="form-control" id="apellido" placeholder="Ingresar Apellido/s" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlInput1">NOMBRE/s</label>
		    <input type="text" class="form-control" id="nombre" placeholder="Ingresar Nombre/s" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label>TELEFONO</label>
		      <input type="number" class="form-control" id="telefono" placeholder="Ingresar Telefono">
		    </div>
		    <div class="form-group col-md-6">
		      <label>CELULAR</label>
		      <input type="number" class="form-control" id="celular" placeholder="Ingresar Celular">
		    </div>
		  </div>

		  <div class="form-group">
		    <label>DIRECCION</label>
		    <textarea class="form-control" id="direccion" rows="2" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
		  </div>

		  <div class="form-group">
		    <label>ESTADO</label>
		    <select class="form-control" id="estado">
		      <option>ACTIVO</option>
		      <option>INACTIVO</option>
		    </select>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
      	<div id="respuestaregistro"></div>
        <button type="button" id="registrar_empleado" class="btn btn-primary">GUARDAR</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
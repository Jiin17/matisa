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
                url: 'reg_cliente.php', 
                data: 'ci='+$("#ci").val()+
                '&cii='+$("#cii").val()+
                '&nombre='+$("#nombre").val()+
                '&apellido='+$("#apellido").val()+
                '&telefono='+$("#telefono").val()+
                '&celular='+$("#celular").val()+
                '&direccion='+$("#direccion").val()+
                '&ocupacion='+$("#ocupacion").val(), 
                success: function(resp){ 
                    $('#respuestaregistro').html(resp) 
                    } 
                });
        });
    });

    </script>
  <script type="text/javascript">
function busca() {
              var texto = $("input#busquedacli").val();

              if (texto != "") {
                  $.post("bus_cliente.php", {valor: texto}, function(mensaje) {
                      $("#respuesta").html(mensaje);
                  }); 
              } else { 
                  ("#respuesta").html("<p>VACIO</p>");
            };
          };
     </script>
</head>
<body>


  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h3>BUSCAR CLIENTE:</h3>
		</div>
      <div class="modal-body">
	      <div class="form-group">
		    <label for="exampleFormControlInput1">INGRESAR NOMBRE O CI:</label>
		    <input type="text" class="form-control" onKeyUp="busca();" id="busquedacli" placeholder="Ingresar Nombre o CI" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
      </div>

    	<div class="modal-body" id="respuesta">
			<div class="table-responsive">

			</div>
    	</div>
    </div>
  </div>


<!-- Modal REG EMPLEADO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO CLIENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form>
			<div class="form-group">
			    <label>CI</label>
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
		  <div class="form-group">
		    <label>OCUPACION</label>
		    <textarea class="form-control" id="ocupacion" rows="2" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
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
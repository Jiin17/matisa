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
function busca() {
              var texto = $("input#busquedacli").val();

              if (texto != "") {
                  $.post("bus_automovil.php", {valor: texto}, function(mensaje) {
                      $("#respuesta").html(mensaje);
                  }); 
              } else { 
                  ("#respuesta").html("<p>VACIO</p>");
            };
          };
     </script>
</head>
<body>

<!-- <img src="imagesautos/fondo.jpg"> -->


  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h3>BUSCAR VEHICULO:</h3>
		</div>
      <div class="modal-body">
	      <div class="form-group">
		    <label for="exampleFormControlInput1">INGRESAR NOMBRE O CI:</label>
		    <input type="text" class="form-control" onKeyUp="busca();" id="busquedacli" placeholder="Ingresar Num Chasis/Num Motor" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO VEHICULO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class='form-horizontal form-label-left' name='frmv' method='POST' action='reg_vehivulo.php' enctype='multipart/form-data' >
		  <div class="form-group">
		    <label for="exampleFormControlInput1">NUMERO CHASIS</label>
		    <input type="text" class="form-control" id="chasis" name="chasis" placeholder="Ingresar Numero de Chasis" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlInput1">NUMERO DE MOTOR</label>
		    <input type="text" class="form-control" id="num_motor" name="num_motor" placeholder="Ingresar Numero de Motor" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlInput1">MODELO</label>
		    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingresar Modelo" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlInput1">COLOR</label>
		    <input type="text" class="form-control" id="color" name="color" placeholder="Ingresar Color" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
<!-- 		 <div class="form-group">
		    <label for="exampleFormControlInput1">ESTADO</label>
		    <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingresar Estado" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div> -->
		 <div class="form-group">
		    <label for="exampleFormControlInput1">PRECIO PROFORMA (Bs.)</label>
		    <input type="text" class="form-control" id="precio_proforma" name="precio_proforma" placeholder="Ingresar Precio Proforma" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">AÑO</label>
        <input type="text" class="form-control" id="anio" name="anio" placeholder="Ingresar Año" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">CILINDRADA</label>
        <input type="text" class="form-control" id="cilindrada" name="cilindrada" placeholder="Ingresar Cilindrada" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">TRACCION</label>
        <input type="text" class="form-control" id="traccion" name="traccion" placeholder="Ingresar Traccion" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">PROCEDENCIA</label>
        <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="Ingresar Procedencia" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
  <div class="form-group">
    <label for="inputAddress">FOTO</label>
    <input type="file" class="form-control" name="foto" placeholder="Ingresar una descripcion">
  </div>
			<div class="form-group">
			    <label>MARCA</label>
			        <div class="input-group">
			            <select class="form-control" id="idmarca" name="idmarca">
<?php 
$hsh=mysql_query("SELECT * FROM marca");
while ($ds=mysql_fetch_array($hsh)) {
echo "<option value='$ds[0]'>$ds[1]</option>";
}

 ?>
			            </select>
			            <span class="input-group-btn">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalmarc">+</button>
			            </span>
			        </div>
			</div>
			<div class="form-group">
			    <label>TIPO VEICULO</label>
			        <div class="input-group">
			            <select class="form-control" id="idtipo_vehiculo" name="idtipo_vehiculo">
<?php 
$hsh=mysql_query("SELECT * FROM tipo_veiculo");
while ($ds=mysql_fetch_array($hsh)) {
echo "<option value='$ds[0]'>$ds[1]</option>";
}

 ?>
			            </select>
			            <span class="input-group-btn">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaltipovehi">+</button>
			            </span>
			        </div>
			</div>
      </div>
      <div class="modal-footer">
      	<div id="respuestado_todo"></div>
        <input type="submit" value="GUARDAR" class="btn btn-primary">
        <!-- <button type="button" id="registro_tood" class="btn btn-primary">GUARDAR</button> -->
      </div>
		</form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalmarc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO MARCA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="exampleFormControlInput1">MARCA</label>
		    <input type="text" class="form-control" id="marca" placeholder="Ingresar Marca" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
      </div>
      <div class="modal-footer">
      	<div id="respuesta_marcva"></div>
        <button type="button" class="btn btn-primary" id="gusradarmarca">GUARDAR</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModaltipovehi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO TIPO VEHICULO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
		    <label for="exampleFormControlInput1">TIPO VEHICULO</label>
		    <input type="text" class="form-control" id="tipo_marca" placeholder="Ingresar Vehiculo" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
      </div>
      <div class="modal-footer">
      	<div id="respuesta_tipo"></div>
        <button type="button" class="btn btn-primary" id="gusradartipo">GUARDAR</button>
      </div>
    </div>
  </div>
</div>








</body>
</html>
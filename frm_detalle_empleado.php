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
    		<h3>EMPLEADO</h3>
  <?php 
$otracon=mysql_query("SELECT * FROM empleado WHERE estado='ACTIVO' and idempleado='$idempleado'");
$nfilas=mysql_num_rows($otracon);
if ($nfilas==0) {
  echo "<a class='btn btn-success' href='activa_empleado.php?idempleado=$idempleado'>ARCTIVAR</a>";
}else{
  echo "<a class='btn btn-danger' href='desactiva_empleado.php?idempleado=$idempleado'>DESACTIVAR</a>";
}


$conta=mysql_query("SELECT * FROM empleado e INNER JOIN usuario u ON e.idempleado=u.idempleado 
					WHERE e.idempleado='$idempleado'");
$nfilas=mysql_num_rows($conta);
if($nfilas==0){
	echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
			  REGISTRAR NUEVO USUARIO
			</button>";
}
   ?>
		</div>
	<!-- </div> -->
    	<!-- </div> -->
    	<div class="modal-body">
			<div class="table-responsive">
			  <table class="table table-bordered">
<?php
$consul=mysql_query("SELECT ci,nombre,apellido,telefono,celular,direccion,estado,idempleado
					FROM empleado WHERE idempleado='$idempleado'");
while ($th=mysql_fetch_array($consul)) {
 	echo "
 	   <tr><th>CI</th>	 		<td>$th[0]</td>
 	   <tr><th>NOMBRE/S</th>	<td>$th[1] $th[2]</td>
 	   <tr><th>TELEFONO</th>	<td>$th[3]</td>
 	   <tr><th>CELULAR</th>		<td>$th[4]</td>
 	   <tr><th>DIRECCION</th>	<td>$th[5]</td>
 	   <tr><th>ESTADO</th>		<td>$th[6]</td>
		<input type='hidden' id='idempleado' value='$idempleado'>
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		  <div class="form-group">
		    <label for="exampleFormControlInput1">USUARIO</label>
		    <input type="text" class="form-control" id="usuario" placeholder="Ingresar Usuario">
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlInput1">CONTRASEÑA</label>
		    <input type="password" class="form-control" id="contrasenia" placeholder="Ingresar Contraseña">
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlInput1">REPETIR CONTRASEÑA</label>
		    <input type="password" class="form-control" id="repcontrasenia" placeholder="Repetir Contraseña">
		  </div>

		  <div class="form-group">
		    <label>TIPO EMPLEADO</label>
		    <select class="form-control" id="tipo_empleado">
		      <option>EJECUTIVO DE VENTAS</option>
		      <option>CONTADOR</option>
		      <option>ABOGADO</option>
		      <option>ADMINISTRATIVO</option>
		      <option>ADMINISTRADOR</option>
		    </select>
		  </div>
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
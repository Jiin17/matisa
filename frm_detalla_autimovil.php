<?php 
include("libreria.php");
$cnx=conectar();
session_start();
$idempleado=$_SESSION['idempleado'];
    $conectar=mysql_query("SELECT tipo_empleado FROM usuario WHERE idempleado='$idempleado'");
    $ver=mysql_fetch_array($conectar);
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
    		<h3>DETALLE AUTOMOVIL</h3>
        <?php 
        if ($ver[0]=='ADMINISTRADOR') {
echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>
        EDITAR VEHICULO
      </button>";
        }

echo "<a href='rep_detalle_vehiculo.php?idautomovil=$idautomovil' target='_blank' class='btn btn-primary'>IMPRIMIR</a>";
         ?>
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
 
        if ($ver[0]=='ADMINISTRADOR') {
          echo "<tr><th>PRECIO PROFORMA</th>   <td>$th[6]</td></tr>";
        }

$idvehivulo=$th[0];
$num_chasis=$th[1];
$num_motor=$th[2];
$color=$th[3];
$modelo=$th[4];
$estado=$th[5];
$precio_proforma=$th[6];
$cilindrada=$th[8];
$anio=$th[9];
$traccion=$th[10];
$idmarca=$th[11];
$marca=$th[17];
$procedencia=$th[13];
$idtipo_veiculo=$th[14];
$tipo_veiculo=$th[15];

 } 


?>
			  </table>
			</div>
    	</div>
    </div>
  </div>
</body>
</html>

<!-- Modal REG EMPLEADO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICAR VEHICULO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class='form-horizontal form-label-left' name='frmv' method='POST' action='mod_vehiculo.php' enctype='multipart/form-data' >
<?php 
echo "
  <input type='hidden' name='idautomovil' value='$idvehivulo'>
";
 ?>
      <div class="form-group">
        <label for="exampleFormControlInput1">NUMERO CHASIS</label>
        <input type="text" class="form-control" id="chasis" name="chasis" placeholder="Ingresar Numero de Chasis" value="<?php echo"$num_chasis";?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">NUMERO DE MOTOR</label>
        <input type="text" class="form-control" id="num_motor" name="num_motor" placeholder="Ingresar Numero de Motor" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo""?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">MODELO</label>
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingresar Modelo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$modelo"?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">COLOR</label>
        <input type="text" class="form-control" id="color" name="color" placeholder="Ingresar Color" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$color"?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">PRECIO PROFORMA (Bs.)</label>
        <input type="text" class="form-control" id="precio_proforma" name="precio_proforma" placeholder="Ingresar Precio Proforma" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$precio_proforma"?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">AÑO</label>
        <input type="text" class="form-control" id="anio" name="anio" placeholder="Ingresar Año" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$anio"?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">CILINDRADA</label>
        <input type="text" class="form-control" id="cilindrada" name="cilindrada" placeholder="Ingresar Cilindrada" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$cilindrada"?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">TRACCION</label>
        <input type="text" class="form-control" id="traccion" name="traccion" placeholder="Ingresar Traccion" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$traccion"?>">
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">PROCEDENCIA</label>
        <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="Ingresar Procedencia" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo"$procedencia"?>">
      </div>

      <div class="form-group">
          <label>MARCA</label>
              <div class="input-group">
                  <select class="form-control" id="idmarca" name="idmarca">
<?php 
echo "<option value='$idmarca'>$marca</option>";
$hsh=mysql_query("SELECT * FROM marca");
while ($ds=mysql_fetch_array($hsh)) {
echo "<option value='$ds[0]'>$ds[1]</option>";
}

 ?>
                  </select>
                  <span class="input-group-btn">
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalmarc">+</button> -->
                  </span>
              </div>
      </div>
      <div class="form-group">
          <label>TIPO VEICULO</label>
              <div class="input-group">
                  <select class="form-control" id="idtipo_vehiculo" name="idtipo_vehiculo">
<?php 
echo "<option value='$idtipo_veiculo'>$tipo_veiculo</option>";
$hsh=mysql_query("SELECT * FROM tipo_veiculo");
while ($ds=mysql_fetch_array($hsh)) {
echo "<option value='$ds[0]'>$ds[1]</option>";
}

 ?>
                  </select>
                  <span class="input-group-btn">
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaltipovehi">+</button> -->
                  </span>
              </div>
      </div>
      </div>
      <div class="modal-footer">
        <div id="respuestado_todo"></div>
        <input type="submit" value="MODIFICAR" class="btn btn-primary">
        <!-- <button type="button" id="registro_tood" class="btn btn-primary">GUARDAR</button> -->
      </div>
    </form>
    </div>
  </div>
</div>
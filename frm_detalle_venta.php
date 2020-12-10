<?php 
session_start();
$idempleado=$_SESSION['idempleado'];
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

<!-- <img src="imagesautos/fondo.jpg"> -->


  <div class="modal-dialog modal-lg">
    <div class="modal-content">
<h3><CENTER>DATOS CLIENTE</CENTER></h3>
      <div class="modal-body" id="respuesta">
        <table class="table table-bordered sm">
<?php
$consul=mysql_query("SELECT *
          FROM cliente WHERE idcliente='$idcliente'");
while ($th=mysql_fetch_array($consul)) {
  echo "
     <tr><th colspan='2'>NOMBRE/S </th>   <th colspan='2'>CI</th>  </tr>
     <tr> <td colspan='2' >$th[2]</td> <td colspan='2'>$th[1]</td>  </tr>
     
     <tr><th>OCUPACION</th> <th>DIRECCION</th>  <th>TELEFONO</th> <th>CELULAR</th> 
     <tr> <td>$th[3]</td>   <td>$th[4]</td>    <td>$th[5]</td>   <td>$th[6]</td> </tr>    
  ";
 } 
?>
        </table>
      </div>


<h3><CENTER>DATOS VEHICULO</CENTER></h3>
    	<div class="modal-body" id="respuesta">
        <table class="table table-bordered sm">
<?php
$consul=mysql_query("SELECT *
          FROM automovil a INNER JOIN tipo_veiculo tv ON tv.idtipo_veiculo=a.idtipo_veiculo  
          INNER JOIN marca m ON m.idmarca=a.idmarca 
          WHERE idautomovil='$idautomovil'");
while ($th=mysql_fetch_array($consul)) {
  echo "
     
     <tr><th colspan='2'>N° CHASIS</th>  <th colspan='2'>N° MOTOR</th>    </tr>
     <tr>   <td colspan='2'>$th[1]</td>    <td colspan='2'>$th[2]</td>  </tr>
     <tr> <th>MODELO</th> <th>COLOR</th>     <th>CILINDRADA</th> <th>AÑO</th>   </tr>
     <tr>   <td>$th[4]</td>    <td>$th[3]</td> <td>$th[8]</td><td>$th[10]</td></tr>
         
       <tr>  <th>TRACCION</th>   <th>MARCA</th>   <th colspan='2'>TIPO VEHICULO</th>    </tr>
     <tr>            <td>$th[9]</td> <td>$th[16]</td> <td colspan='2'>$th[14]</td> </tr>
 
  ";
 } 
?>
        </table>
      </div>



<h3><CENTER>DETALLE DE VENTA</CENTER></h3>
      <div class="modal-body">
    <form class='form-horizontal form-label-left' name='frmv' method='POST' action='reg_venta.php' enctype='multipart/form-data'>

      <div class="form-group">
        <label for="exampleFormControlInput1">CODIGO CLIENTE</label>
        <input type="text" class="form-control" name="cod_cli" placeholder="Asignar Codigo de Cliente" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">FECHA DE VENTA</label>
        <?php 
$fecha=date('Y-m-d');
echo "<input type='text' class='form-control' name='fecha' value='$fecha' readonly>";
         ?>
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">PRECIO DE VENTA (Bs.)</label>
        <input type="number" class="form-control" name="precio" placeholder="Ingresar Precio en Bs." onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

  <div class="form-group">
    <label for="inputAddress">DOC. N°1</label>
    <input type="file" class="form-control" name="doc1">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°2</label>
    <input type="file" class="form-control" name="doc2">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°3</label>
    <input type="file" class="form-control" name="doc3">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°4</label>
    <input type="file" class="form-control" name="doc4">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°5</label>
    <input type="file" class="form-control" name="dic5">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°6</label>
    <input type="file" class="form-control" name="doc6">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°7</label>
    <input type="file" class="form-control" name="doc7">
  </div>
  <div class="form-group">
    <label for="inputAddress">DOC. N°8</label>
    <input type="file" class="form-control" name="doc8">
  </div>
  <?php 
echo "
<input type='hidden' name='idempleado' value='$idempleado'>
<input type='hidden' name='idcliente' value='$idcliente'>
<input type='hidden' name='idautomovil' value='$idautomovil'>
";
 ?>
 <input type="submit" name="guardar" class='btn btn-primary btn-lg btn-block' value="REGISTAR VENTA">
    </form>
      </div>



    </div>
  </div>







</body>
</html>
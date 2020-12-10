    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function (){
        $("#reg_costo").on("click", function (){
            $.ajax({ 
                url: 'reg_costos.php', 
                data: 'descripcion='+$("#descripcion").val()+
                '&costo='+$("#costo").val()+ 
                '&idventa='+$("#idventa").val(), 
                success: function(resp){ 
                    $('#respuesta_costo').html(resp) 
                    } 
                });
        });
    });

    </script>
<?php 
include("libreria.php");
$cnx=conectar();

if ($cod_cli=="" OR $precio=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
// doc 1
$nomfoto1=$HTTP_POST_FILES["doc1"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto1;
move_uploaded_file($HTTP_POST_FILES["doc1"]["tmp_name"],$ruta);
// doc 2
$nomfoto2=$HTTP_POST_FILES["doc2"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto2;
move_uploaded_file($HTTP_POST_FILES["doc2"]["tmp_name"],$ruta);
// doc 3
$nomfoto3=$HTTP_POST_FILES["doc3"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto3;
move_uploaded_file($HTTP_POST_FILES["doc3"]["tmp_name"],$ruta);
// doc 4
$nomfoto4=$HTTP_POST_FILES["doc4"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto4;
move_uploaded_file($HTTP_POST_FILES["doc4"]["tmp_name"],$ruta);
// doc 5
$nomfoto5=$HTTP_POST_FILES["doc5"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto5;
move_uploaded_file($HTTP_POST_FILES["doc5"]["tmp_name"],$ruta);
// doc 6
$nomfoto6=$HTTP_POST_FILES["doc6"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto6;
move_uploaded_file($HTTP_POST_FILES["doc6"]["tmp_name"],$ruta);
// doc 7
$nomfoto7=$HTTP_POST_FILES["doc7"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto7;
move_uploaded_file($HTTP_POST_FILES["doc7"]["tmp_name"],$ruta);
// doc 8
$nomfoto8=$HTTP_POST_FILES["doc8"]["name"];
$ruta="C:/AppServ/www/matisa3.0/imagesdocumentos/".$nomfoto8;
move_uploaded_file($HTTP_POST_FILES["doc8"]["tmp_name"],$ruta);


	$datos=mysql_query("INSERT INTO ventas(
        cod_cli,precio_venta,fecha_venta,tipo_venta,estado,idempleado,idcliente,idautomovil,doc1,doc2,doc3,doc4,doc5,doc6,doc7,doc8) 
		     VALUES('$cod_cli','$precio','$fecha','DIRECTA','CANCELADO','$idempleado','$idcliente','$idautomovil','$nomfoto1','$nomfoto2','$nomfoto3','$nomfoto4','$nomfoto5','$nomfoto6','$nomfoto7','$nomfoto8')");
    $idventa=mysql_insert_id();
	if ($datos) {
    	echo "<div class='alert alert-success' role='alert'>SE REGISTRO CORRECTAMENTE</div>";
		// echo "<META HTTP-EQUIV='REFRESH' CONTENT='2; URL=veiculo.php'>";
?>
<div class="container">
<div class="modal-content">
        <center><h2 class="modal-title">RECIBO DE DESEMBOLSO</h2></center>
    <div class="modal-body">
        <table class="table table-bordered sm">
            <tr>
                <th colspan='2'>FECHA</th><td colspan='2'><?php echo "$fecha"; ?></td>
                <th colspan='2'>SUCURSAL</th><td colspan='2'>ORURO</td>
            </tr>
            <tr>
              <th colspan='2'>NOMBRE DEL CLIENTE</th>
              <td colspan='4'>
<?php 
$consu=mysql_query("SELECT nombre FROM cliente WHERE idcliente='$idcliente'");
while ($trs=mysql_fetch_array($consu)) {
  # code...
  echo "$trs[0]";
}
 ?>
              </td>
            </tr>
            <tr>
                <th colspan='2'>PRECIO DE VENTA</th>
                <td colspan='6'>
                    <?php 
require "conversor.php";
$resultado = convertir($precio);
echo "$precio Bs. / $resultado";
                     ?>
                </td>
            </tr>
            <tr>
                <th colspan='2'>ANTISIPO</th><td colspan='2'></td>
                <th colspan='2'>FECHA</th><td colspan='2'></td>
            </tr>
            <tr>
                <th colspan='2'>N° DE RECIVO</th><td colspan='2'></td>
                <th colspan='2'>E.I.F./OFI</th><td colspan='2'>MATISA AUTOS</td>
            </tr>
            <tr>
                <th colspan='2'>MONTO DE DESEMBOLSO</th><td colspan='6'></td>
            </tr>
            <tr>
                <th colspan='2'>E.I.F./OFI</th>
                <td colspan='2'>
                    <?php 
$gu=mysql_query("SELECT * FROM empleado WHERE idempleado='$idempleado'");
while ($we=mysql_fetch_array($gu)) {
    echo "LIC. $we[2] $we[3]";
}
                     ?>
                </td>
                <th colspan='2'>N° DE RECIVO</th><th colspan='2'></th>
            </tr>
            <tr>
                <th colspan='2'>SALDO</th><td colspan='2'></td>
                <th colspan='2'>FECHA DE PAGO</th><td colspan='2'></td>
            </tr>
            <tr>
                <th colspan='2'>GARANTIA</th><td colspan='2'></td>
                <th colspan='2'>INTERES</th><td colspan='2'></td>
            </tr>
            <?php 
$consul=mysql_query("SELECT *
          FROM automovil a INNER JOIN tipo_veiculo tv ON tv.idtipo_veiculo=a.idtipo_veiculo  
          INNER JOIN marca m ON m.idmarca=a.idmarca 
          WHERE idautomovil='$idautomovil'");
while ($th=mysql_fetch_array($consul)) {
  echo "
     <hr>
     <tr><th colspan='2'>N° CHASIS</th> <td colspan='2'>$th[1]</td>
     <th colspan='2'>N° MOTOR</th>      <td colspan='2'>$th[2]</td>
     </tr>
     <tr>
         <th>MODELO</th><td>$th[4]</td>
         <th>COLOR</th><td>$th[3]</td> 
         <th>CILINDRADA</th><td>$th[8]</td>
         <th>AÑO</th><td>$th[10]</td>   
     </tr>
     <tr>  
         <th>TRACCION</th>   <td>$th[9]</td>
         <th>MARCA</th>   <td>$th[16]</td> 
         <th colspan='2'>TIPO VEHICULO</th>  <td colspan='2'>$th[14]</td>  
     </tr>
  ";
 } 
             ?>
        </table>
<h3><CENTER>OTROS GASTOS</CENTER></h3>
<div class="content">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModale">
  REGISTRAR GASTO
</button>
</div>
      <div class="modal-body" id="respuesta_costo">
        <table class="table table-bordered sm">
          <tr>
            <th>DESCRIPCION</th>
            <th>COSTO (Bs.)</th>
            <th>x</th>
          </tr>
<?php 
$cona=mysql_query("SELECT * FROM otrosgastos WHERE idventas='$idventa'");
while ($qw=mysql_fetch_array($cona)) {
      echo "
   <script type='text/javascript'>
    $(document).ready(function (){
        $('#borrar-$qw[0]').on('click', function (){
            $.ajax({ 
                url: 'eli_otrogas.php', 
                data: 'idotrogas='+$('#idpiesadent-$qw[0]').val(),
                success: function(resp){ 
                    $('#respuesta_tap-$qw[0]').html(resp) 
                    } 
                });
        });
    });
    </script>
      ";    
    echo "
    <tr id='respuesta_tap-$qw[0]'>
        <td>$qw[1]</td>
        <td>$qw[2]</td>
          <input type='hidden' value='$qw[0]' id='idpiesadent-$qw[0]'>
        <td><center><button type='button' id='borrar-$qw[0]' class='btn btn-outline-danger'>X</button></center></td>
    </tr>
    ";
}
 ?>
        </table>
      </div>
      <a href="cliente.php" class='btn btn-primary btn-lg btn-block'> FINALIZAR</a>

    </div>    
</div>
</div>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO GASTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group">
        <label for="exampleFormControlInput1">DESCRIPCION</label>
        <input type="text" class="form-control" id="descripcion" placeholder="Ingresar Descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();">
        <?php 
echo "<input type='hidden' id='idventa' value='$idventa'>";
         ?>
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">COSTO (Bs.)</label>
        <input type="number" class="form-control" id="costo" placeholder="Ingresar Costo en Bs." onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reg_costo" data-dismiss="modal">REGISTRAR</button>
        <!-- <button type="button" class="btn btn-primary">REGISTAR</button> -->
      </div>
    </div>
  </div>
</div>
<?php
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}
 ?>
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
    <script type="text/javascript">
    $(document).ready(function (){
        $("#reg_costo").on("click", function (){
            $.ajax({ 
                url: 'reg_costos.php', 
                data: 'descripcion='+$("#descripcion").val()+
                '&costo='+$("#costo").val()+ 
                '&tipo_cambio='+$("#tipo_cambio").val()+ 
                '&idventa='+$("#idventa").val(), 
                success: function(resp){ 
                    $('#respuesta_costo').html(resp) 
                    } 
                });
        });
    });

    </script>

    <script type="text/javascript">
    $(document).ready(function (){
        $("#reg_des").on("click", function (){
            $.ajax({ 
                url: 'reg_desembolso.php', 
                data: 'num_recibo='+$("#num_recibo").val()+
                '&fecha_des='+$("#fecha_des").val()+ 
                '&costodes='+$("#costodes").val()+ 
                '&tipo_cambiodes='+$("#tipo_cambiodes").val()+ 
                '&idventa='+$("#idventa").val(), 
                success: function(resp){ 
                    $('#respuesta_des').html(resp) 
                    } 
                });
        });
    });

    </script>

    <script type="text/javascript">
    $(document).ready(function (){
        $("#reg_planpago").on("click", function (){
            $.ajax({ 
                url: 'reg_plan_pago.php', 
                data: 'fecha_plan_pago='+$("#fecha_plan_pago").val()+
                '&mostoplanpago='+$("#mostoplanpago").val()+ 
                '&tipo_cambiopalpago='+$("#tipo_cambiopalpago").val()+ 
                '&cantmeses='+$("#cantmeses").val()+ 
                '&interespa='+$("#interespa").val()+ 
                '&idventa='+$("#idventa").val(), 
                success: function(resp){ 
                    $('#respuesta_plan').html(resp) 
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
    		<h3>VENTA REALIZADA</h3>
		</div>
	<!-- </div> -->
    	<!-- </div> -->
    	<div class="modal-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
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
          WHERE v.idventas='$idventas'");
while ($th=mysql_fetch_array($consul)) {
 	echo "
  <tr>
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
            <th>COSTO ($)</th>
            <th>ELIMINAR</th>
          </tr>
<?php 
$cona=mysql_query("SELECT * FROM otrosgastos WHERE idventas='$idventas'");
while ($qw=mysql_fetch_array($cona)) {
    $dolar=number_format($qw[2]/$qw[3],2);
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
        <td>$dolar</td>
          <input type='hidden' value='$qw[0]' id='idpiesadent-$qw[0]'>
    ";
        if ($ver[0]=='ADMINISTRADOR') {
    echo "
        <td><center><button type='button' id='borrar-$qw[0]' class='btn btn-outline-danger'>X</button></center></td>
    </tr>
    ";
        }

}
 ?>
        </table>
      </div>

<h3><CENTER>DESEMBOLSO</CENTER></h3>
<div class="content">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  REGISTRAR DESEMBOLSO
</button>
</div>
      <div class="modal-body" id="respuesta_des">
        <table class="table table-bordered sm">
          <tr>
            <th>N° RECIBO</th>
            <th>FECHA</th>
            <th>MONTO (Bs.)</th>
            <th>MONTO ($)</th>
            <th>ELIMINAR</th>
          </tr>
<?php 
$cona=mysql_query("SELECT * FROM desembolso WHERE idventas='$idventas'");
while ($des=mysql_fetch_array($cona)) {
    $dolardes=number_format($des[1]/$des[2],2);
      echo "
   <script type='text/javascript'>
    $(document).ready(function (){
        $('#borrar-$des[0]').on('click', function (){
            $.ajax({ 
                url: 'eli_desembolso.php', 
                data: 'iddesem='+$('#idpiesadent-$des[0]').val(),
                success: function(resp){ 
                    $('#respuesta_tap-$des[0]').html(resp) 
                    } 
                });
        });
    });
    </script>
      ";    
    echo "
    <tr id='respuesta_tap-$des[0]'>
        <td>$des[3]</td>
        <td>$des[4]</td>
        <td>$des[1]</td>
        <td>$dolardes</td>
          <input type='hidden' value='$des[0]' id='idpiesadent-$des[0]'>
    ";
        if ($ver[0]=='ADMINISTRADOR') {
    echo "
        <td><center><button type='button' id='borrar-$des[0]' class='btn btn-outline-danger'>X</button></center></td>
    </tr>
    ";
        }
}
 ?>
        </table>
      </div>


<h3><CENTER>PLAN DE PAGO/S</CENTER></h3>
<div class="content">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalpago">
  REGISTRAR PAGO
</button>

   <script type='text/javascript'>
    $(document).ready(function (){
        $('#borrarplan').on('click', function (){
            $.ajax({ 
                url: 'eli_planpago.php', 
                data: 'idplan='+$('#idpiesaplan').val(),
                success: function(resp){ 
                    $('#respuesta_plan').html(resp) 
                    } 
                });
        });
    });
    </script>

  <?php 
$cnue=mysql_query("SELECT fecha,nomto,cantidad_meses,interes,idplan_pagos FROM plan_pagos WHERE idventas='$idventas' ");
$num=mysql_fetch_array($cnue);
if (mysql_num_rows($cnue)==0) {
  # code...
}else{
$fecha=$num[0];
$monto=$num[1];
$cantmeses=$num[2];
$interes=$num[3];
$idplan_pagos=$num[4];

$intere=($interes/12)/100;

$costo=round(($intere*$monto)/(1-(pow((1/(1+$intere)),$cantmeses))),2);
echo "<a href='frm_pago.php?idplan_pago=$idplan_pagos' class='btn btn-success'>PAGAR</a>
      <input type='hidden' value='$idplan_pagos' id='idpiesaplan'>
      ";
        if ($ver[0]=='ADMINISTRADOR') {
      echo "
      <button type='button' id='borrarplan' class='btn btn-outline-danger'>X</button></div>
      ";
      }
}

   ?>
<div class="modal-body" id="respuesta_plan">
<table class="table table-bordered sm">
  <tr>
    <th>N° CUOTA</th><th>FECHA</th><th>SALDO CAPITAL (Bs.)</th><th>PAGO CAPITAL (Bs.)</th><th>PAGO INTERES (Bs.)</th><th>TOTAL CUOTA (Bs.)</th>
  </tr>
  <?php 
for ($i=0; $i < $cantmeses ; $i++) { 
    $numa=$i+1;
    $interes=round($monto*$intere,2);
    $pago=round($costo-$interes,2);
    echo "<tr>
        <td>$numa</td>
        <td>$fecha</td>
        <td>$monto</td>
        <td>$pago</td>
        <td>$interes</td>
        <td>$costo</td>
    </tr>";
    $fecha=date("Y-m-d",strtotime($fecha."+ 1 month")); 
    $monto=round($monto-$pago,2);
}

   ?>
</table>
</div>


<h3><CENTER>DOCUMENTOS</CENTER></h3>
<div class="content">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaledoc">
  REGISTRAR DOCUMENTO/S
</button>
</div>
<br>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
<?php 
$son=mysql_query("SELECT * FROM documento WHERE ventas_idventas='$idventas'");
while ($tar=mysql_fetch_array($son)) {

            echo "<div><div class='col-md-4'>
                    <h6>$tar[1]</h6>
            <div class='card'>
                <div class='content'>
                    <a href='reg_documento.php?documento=$tar[2]' target='_blank'><img class='ct-perfect-fourth' src='imagesdocumentos/$tar[2]' width='350px'></a>
                    <br>
                </div>                  
            </div>
            </div>
        </div>";
}
 ?>


                </div>
            </div>
        </div>








      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <?php 
echo "
            <td><center><a href='rep_recivo_desembolso.php?idventas=$idventas' target='_blank' class='btn btn-success'>RECIBO DE DESEMBOLSO</a></center></td>
            <td><center><a href='rep_contrato_venta.php?idventas=$idventas' target='_blank' class='btn btn-success'>CONTRATO DE VENTA</a></center></td>
            <td><center><a href='rep_detalle_pagos.php?idventas=$idventas' target='_blank' class='btn btn-success'>DETALLE DE PAGOS</a></center></td>
            <td><center><a href='rep_plan_pagos.php?idventas=$idventas' target='_b (Bs.)lank' class='btn btn-success'>PLAN DE PAGOS</a></center></td>
";
             ?>
          </tr>
        </table>
      </div>

    </div>
  </div>


<!-- documentos -->
<div class="modal fade" id="exampleModaledoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO GASTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class='form-horizontal form-label-left' name='frmv' method='POST' action='reg_documentoo.php' enctype='multipart/form-data' >
     <div class="form-group">
        <label for="exampleFormControlInput1">DESCRIPCION</label>
        <input type="text" class="form-control" name="descrip_doc" placeholder="Ingresar Descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
  <div class="form-group">
    <label for="inputAddress">FOTO</label>
    <input type="file" class="form-control" name="foto" placeholder="Ingresar una descripcion">
  </div>
        <?php 
echo "<input type='hidden' name='idventa' value='$idventas'>";
         ?>

      </div>
      <div class="modal-footer">
        <input type='submit' class="btn btn-primary" value="GUARDAR">
        <!-- <button type="button" class="btn btn-primary" id="reg_costo" data-dismiss="modal">GUARDAR</button> -->
        <!-- <button type="button" class="btn btn-primary">REGISTAR</button> -->
</form>
      </div>
    </div>
  </div>
</div>


<!-- OTROS GASTOS -->
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
echo "<input type='hidden' id='idventa' value='$idventas'>";
         ?>
      </div>

<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totalescosto() {
   with (document.forms["frmv"]) // el nombre del formulario
   {
  var totalResult = Number( costo.value ) / Number( tipo_cambio.value );
  //sumamos las cajas con los nombres
  costo_dolar.value = roundTo( totalResult, 2 );
   }
 }

function roundTo(num,pow){
  if( isNaN( num ) ){
    num = 0;
  }

  num *= Math.pow(10,pow);
  num = (Math.round(num)/Math.pow(10,pow))+ "" ;
  if(num.indexOf(".") == -1)
    num += "." ;
  while(num.length - num.indexOf(".") - 1 < pow)
    num += "0" ;

  return num;
}
</script>

<form name='frmv'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">COSTO (Bs.)</label>
      <input type="number" class="form-control" id="costo" onKeyUp="Totalescosto();" placeholder="Ingresar Costo en Bs.">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">COSTO ($)</label>
      <input type="text" class="form-control" id="costo_dolar" readonly>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">T.C.</label>
      <input type="number" class="form-control" id="tipo_cambio" onKeyUp="Totalescosto();" placeholder="Ingresar T.C." value="6.97">
    </div>
  </div>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reg_costo" data-dismiss="modal">GUARDAR</button>
        <!-- <button type="button" class="btn btn-primary">REGISTAR</button> -->
      </div>
    </div>
  </div>
</div>


<!-- DESEMBOLSO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DESEMBOLSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">N° RECIBO</label>
      <input type="text" class="form-control" id="num_recibo" placeholder="Ingresar Numero de Recibo" onkeyup="javascript:this.value=this.value.toUpperCase();">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">FECHA</label>
<?php 
$fecha=date('Y-m-d');
echo "<input type='text' class='form-control' id='fecha_des' value='$fecha' readonly>";
?>
    </div>
  </div>

        <?php 
echo "<input type='hidden' id='idventa' value='$idventas'>";
         ?>
<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totalescostodes() {
   with (document.forms["frmdes"]) // el nombre del formulario
   {
  var totalResult = Number( costodes.value ) / Number( tipo_cambiodes.value );
  //sumamos las cajas con los nombres
  costodes_dolar.value = roundTo( totalResult, 2 );
   }
 }

function roundTo(num,pow){
  if( isNaN( num ) ){
    num = 0;
  }

  num *= Math.pow(10,pow);
  num = (Math.round(num)/Math.pow(10,pow))+ "" ;
  if(num.indexOf(".") == -1)
    num += "." ;
  while(num.length - num.indexOf(".") - 1 < pow)
    num += "0" ;

  return num;
}
</script>

<form name="frmdes">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">COSTO (Bs.)</label>
      <input type="number" class="form-control" id="costodes" onKeyUp="Totalescostodes();" placeholder="Ingresar Costo en Bs.">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">COSTO ($)</label>
      <input type="text" class="form-control" id="costodes_dolar" readonly>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">T.C.</label>
      <input type="number" class="form-control" id="tipo_cambiodes" onKeyUp="Totalescostodes();" placeholder="Ingresar T.C." value="6.97">
    </div>
  </div>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="reg_des">GUARDAR</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!-- PLAN DE PAGOS -->
<div class="modal fade" id="exampleModalpago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PLAN DE PAGO/S</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputPassword4">FECHA INICIO</label>
      <input type="date" class='form-control' id="fecha_plan_pago" >
    </div>
  </div>

        <?php 
echo "<input type='hidden' id='idventa' value='$idventas'>";
         ?>
<script language="javascript">
//el nombre de nustra funcion "Totales"
 function planpago() {
   with (document.forms["frmpago"]) // el nombre del formulario
   {
  var totalResult = Number( mostoplanpago.value ) / Number( tipo_cambiopalpago.value );
  //sumamos las cajas con los nombres
  montoplanpago_dol.value = roundTo( totalResult, 2 );
   }
 }

function roundTo(num,pow){
  if( isNaN( num ) ){
    num = 0;
  }

  num *= Math.pow(10,pow);
  num = (Math.round(num)/Math.pow(10,pow))+ "" ;
  if(num.indexOf(".") == -1)
    num += "." ;
  while(num.length - num.indexOf(".") - 1 < pow)
    num += "0" ;

  return num;
}
</script>

<form name="frmpago">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">MONTO (Bs.)</label>
      <input type="number" class="form-control" id="mostoplanpago" onKeyUp="planpago();" placeholder="Ingresar Monto en Bs.">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">MONTO ($)</label>
      <input type="text" class="form-control" id="montoplanpago_dol" readonly>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">T.C.</label>
      <input type="number" class="form-control" id="tipo_cambiopalpago" onKeyUp="planpago();" placeholder="Ingresar T.C." value="6.97">
    </div>
  </div>
</form>
     <div class="form-group">
        <label for="exampleFormControlInput1">CANTIDAD DE MESES</label>
        <input type="number" class="form-control" id="cantmeses" placeholder="Ingresar Cantidad De Meses" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
           <div class="form-group">
        <label for="exampleFormControlInput1">Tasa De Interes Anual (%)</label>
        <input type="number" class="form-control" id="interespa" placeholder="Ingresar Tasa De Interes Anual" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="reg_planpago">GUARDAR</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


</body>
</html>

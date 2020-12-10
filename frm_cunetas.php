<?php 
include("libreria.php");
$cnx=conectar();
session_start();
$nuevo=$_SESSION['idempleado'];
$fecha=date("Y-m-d");
 ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   <script type="text/javascript">

    $(document).ready(function (){
        $("#reg_detlebtn").on("click", function (){//ID DEL BOTON 
            $.ajax({ 
                url: 'reg_detalle_transaccion_entidadfinanciera.php', //DONDE VA HA IR
                data: 'descrip_deta='+$("#descrip_deta").val(),//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                success: function(resp){ 
                    $('#respuesta_transac').html(resp) //ID DEL "DIV" DE RESPUESTA
                    } 
                });
        });
    });
    </script>

   <script type="text/javascript">

    $(document).ready(function (){
        $("#reg_des").on("click", function (){//ID DEL BOTON 
            $.ajax({ 
                url: 'reg_cuenta_por_pagar.php', //DONDE VA HA IR
                data: 'fecha_apagar='+$("#fecha_apagar").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&fecha_registro='+$("#fecha_registro").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&detalle='+$("#detalle").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&num_recibo='+$("#num_recibo").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&costodes='+$("#costodes").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&tipo_cambiodes='+$("#tipo_cambiodes").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&garantia='+$("#garantia").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&num_contrato='+$("#num_contrato").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&idempleado='+$("#idempleado").val(),//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                success: function(resp){ 
                    $('#repuesta').html(resp) //ID DEL "DIV" DE RESPUESTA
                    } 
                });
        });
    });
    </script>

<script language="JavaScript">
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ; 
} 
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}
</script>

  </head>
 <body style="background:url(images/fondo.jpg)">
  <br>
<div class="container">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CUENTA/S</h5>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">REGISTRAR CUENTA POR PAGAR</button>
      </div>
      <div class="modal-body">
<div class="table-responsive-sm" id="repuesta">
 <table class="table table-bordered">
  <tr>
    <th colspan="9"><h2>CUENTAS POR PAGAR</h2></th>
  </tr>
  <tr>
    <th rowspan="2">DETALLE</th>
    <th rowspan="2">NUMERO DE RECIBO</th>
    <th rowspan="2">GARANTIA</th>
    <th rowspan="2">FECHA DE REGISTRO</th>
    <th rowspan="2">FECHA DE PAGO</th>
    <th colspan="2">MONTO</th>
    <th rowspan="2">TIPO DE CAMBIO</th>
    <th rowspan="2">NUMERO DE CONTRATO</th>
  </tr>
  <tr>
    <th>Bs.</th>
    <th>$</th>
  </tr>
<?php 
$jsj=mysql_query("SELECT detalle, num_recibo, garantia, fecha_registro, fecha_a_pagar, monto,tipo_cambio, num_contrato FROM cuenta_por_pagar");
while ($y=mysql_fetch_array($jsj)) {
  # code...
  $total=$total+$y[5];
$dol=round($y[5]/$y[6],2);
echo "<tr>
<td>$y[0]</td>
<td>$y[1]</td>
<td>$y[2]</td>
<td>$y[3]</td>
<td>$y[4]</td>
<td>$y[5]</td>
<td>$dol</td>
<td>$y[6]</td>
<td>$y[7]</td>
</tr>";
}
echo "<th colspan='9'><center><h4>TOTAL POR PAGAR: $total Bs.</h4></center></th>";
 ?>
</table>

 <table class="table table-bordered">
  <tr>
    <th colspan="9"><h2>CUENTAS POR COBRAR</h2></th>
  </tr>
  <tr>
    <th rowspan="2">DETALLE/CODIGO CLIENTE</th>
    <th rowspan="2">GARANTIA</th>
    <th rowspan="2">FECHA DE VENTA</th>
    <th colspan="2">SALDO DEUDA</th>
    <th rowspan="2">TIPO DE CAMBIO</th>
  </tr>
  <tr>
    <th>Bs.</th>
    <th>$</th>
  </tr>
<?php 
$jsj=mysql_query("SELECT cod_cli, garantia, fecha_venta, saldo, tipo_de_cambio FROM ventas WHERE estado='INCOMPLETO'");
while ($y=mysql_fetch_array($jsj)) {
  # code...
  $totalere=$totalere+$y[3];
$dol=round($y[3]/$y[4],2);
echo "<tr>
<td>$y[0]</td>
<td>$y[1]</td>
<td>$y[2]</td>
<td>$y[3]</td>
<td>$dol</td>
<td>$y[4]</td>
</tr>";
}
echo "<th colspan='9'><center><h4>TOTAL POR COBRAR: $totalere Bs.</h4></center></th>";
 ?>
</table>


</div>
<br>
<button type="button" class="btn btn-secondary" id="reg" onclick="imprimir();">cc/Arch</button>
<?php 
echo "<input type='hidden' id='idempleado' value='$nuevo'>";
 ?>
</div>
</div>
</div>
 </body>
 </html>


<!-- DESEMBOLSO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE CUENTA POR PAGAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">FECHA A PAGAR</label>
<?php 
$fecha=date('Y-m-d');
echo "<input type='text' class='form-control' id='fecha_apagar' value='$fecha'>";
?>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">FECHA DE REGISTRO</label>
<?php 
$fecha=date('Y-m-d');
echo "<input type='text' class='form-control' id='fecha_registro' value='$fecha'>";
?>
    </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputEmail4">DETALLE</label>
      <input type="text" class="form-control" id="detalle" placeholder="Ingresar Detalle" onkeyup="javascript:this.value=this.value.toUpperCase();">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">NUMERO DE RECIBO</label>
      <input type="text" class="form-control" id="num_recibo" placeholder="Ingresar Numero de Recibo" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
      <label for="inputCity">MONTO (Bs.)</label>
      <input type="number" class="form-control" id="costodes" onKeyUp="Totalescostodes();" placeholder="Ingresar Costo en Bs.">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">MONTO ($)</label>
      <input type="text" class="form-control" id="costodes_dolar" readonly>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">T.C.</label>
      <input type="number" class="form-control" id="tipo_cambiodes" onKeyUp="Totalescostodes();" placeholder="Ingresar T.C." value="6.97">
    </div>
  </div>
</form>

     <div class="form-group">
        <label for="exampleFormControlInput1">GARANTIA</label>
        <input type="text" class="form-control" id="garantia" placeholder="Ingresar Garantia" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

     <div class="form-group">
        <label for="exampleFormControlInput1">NUMERO DE CONTRATO</label>
        <input type="text" class="form-control" id="num_contrato" placeholder="Ingresar Numero Contrato" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="reg_des">GUARDAR</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>



<!-- documentos -->
<div class="modal fade" id="exampleModaledoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO ENTIDAD FINANCIERA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group">
        <label for="exampleFormControlInput1">DESCRIPCION</label>
        <input type="text" class="form-control" id="descrip_deta" placeholder="Ingresar Descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="reg_detlebtn">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
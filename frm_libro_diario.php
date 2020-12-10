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
                url: 'reg_detalle_transaccion.php', //DONDE VA HA IR
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
                url: 'reg_transaccion.php', //DONDE VA HA IR
                data: 'tipo='+$("#tipo").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&iddetale='+$("#iddetale").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&num_recibo='+$("#num_recibo").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&fecha_des='+$("#fecha_des").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&costodes='+$("#costodes").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&idtransaccion='+$("#idtransaccion").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&idempleado='+$("#idempleado").val()+//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
                      '&tipo_cambiodes='+$("#tipo_cambiodes").val(),//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
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
        <h5 class="modal-title" id="exampleModalLabel">TRANSACCION DIARIA</h5>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">REGISTRAR TRANSACCION</button>
      </div>
      <div class="modal-body">
<div class="table-responsive-sm" id="repuesta">
 <table class="table table-bordered">
  <tr>
    <th colspan="6"><h2>INGRESO/S</h2></th>
  </tr>
  <tr>
    <th rowspan="2">FECHA</th>
    <th rowspan="2">N° RECIVO</th>
    <th rowspan="2">DETALLE</th>
    <th colspan="2">MONTO</th>
    <th rowspan="2">T.C.</th>
  </tr>
  <tr>
    <th>Bs.</th>
    <th>$</th>
  </tr>
<?php 
$jsj=mysql_query("SELECT t.fecha,t.num_recivo,d.detalle,t.monto,t.tipocambio
  FROM transaccion t INNER JOIN detalle_transac d ON t.iddetalle_transac=d.iddetalle_transac 
  WHERE t.tipo='INGRESO' and t.fecha='$fecha'");
while ($y=mysql_fetch_array($jsj)) {
  # code...
  $total=$total+$y[3];
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
echo "<th colspan='6'><center><h4>TOTAL INGRESO: $total Bs.</h4></center></th>";
 ?>
</table>

 <table class="table table-bordered">
  <tr>
    <th colspan="6"><h2>EGRESO/S</h2></th>
  </tr>
  <tr>
    <th rowspan="2">FECHA</th>
    <th rowspan="2">N° RECIVO</th>
    <th rowspan="2">DETALLE</th>
    <th colspan="2">MONTO</th>
    <th rowspan="2">T.C.</th>
  </tr>
  <tr>
    <th>Bs.</th>
    <th>$</th>
  </tr>
<?php 
$jsj=mysql_query("SELECT t.fecha,t.num_recivo,d.detalle,t.monto,t.tipocambio
  FROM transaccion t INNER JOIN detalle_transac d ON t.iddetalle_transac=d.iddetalle_transac 
  WHERE t.tipo='EGRESO' and t.fecha='$fecha'");
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
echo "<th colspan='6'><center><h4>TOTAL EGRESO: $totalere Bs.</h4></center></th>";
 ?>
</table>

 <table class="table table-bordered">
  <tr>
    <th colspan="6"><h5>SALDO ACTUAL: <?php echo "$fecha"; ?></h5></th>
  

<?php 
$totalerel=$total-$totalere;
echo "<th colspan='6'><center><h4> $totalerel Bs.</h4></center></th></tr>";
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE TRANSACCION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="form-group">
          <label>TIPO</label>
              <div class="input-group">
                  <select class="form-control" id="tipo" >
                    <option>INGRESO</option>
                    <option>EGRESO</option>
                  </select>
              </div>
      </div>

      <div class="form-group">
          <label>DETALLE</label>
              <div class="input-group" id="respuesta_transac">
                  <select class="form-control" id="idtransaccion">
<?php 
$hsh=mysql_query("SELECT * FROM detalle_transac");
while ($ds=mysql_fetch_array($hsh)) {
echo "<option value='$ds[0]'>$ds[1]</option>";
}
 ?>
                  </select>
                  <span class="input-group-btn">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaledoc">+</button>
                  </span>
              </div>
      </div>
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputEmail4">N° RECIBO</label>
      <input type="text" class="form-control" id="num_recibo" placeholder="Ingresar Numero de Recibo" onkeyup="javascript:this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">FECHA</label>
<?php 
$fecha=date('Y-m-d');
echo "<input type='date' class='form-control' id='fecha_des' value='$fecha'>";
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DETALLE</h5>
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
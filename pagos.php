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
        $("#reg_planpago").on("click", function (){
            $.ajax({ 
                url: 'reg_plan_pago_gatos.php', 
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
<!-- PLAN DE PAGOS -->
<!-- <div class="modal fade" id="exampleModalpago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
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
<!-- </div>] -->

<div id="respuesta_plan"></div>
</body>
</html>

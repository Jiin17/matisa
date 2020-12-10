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
        $("#reg_pagofin").on("click", function (){
            $.ajax({ 
                url: 'reg_pago_final.php', 
                data: 'fecha='+$("#fecha").val()+
                '&costodes='+$("#costodes").val()+
                '&tipo_cambiodes='+$("#tipo_cambiodes").val()+
                '&idplan_pago='+$("#idplan_pago").val()+
                '&detalle='+$("#detalle").val(), 
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
    		<h3>REGISTRAR PAGO</h3>
		</div>
    	<div class="modal-body">


    <div class="form-group col-md-6">
      <label for="inputPassword4">FECHA</label>
<?php 
$fecha=date('Y-m-d');
echo "<input type='date' class='form-control' id='fecha' value='$fecha'>
<input type='hidden' id='idplan_pago' value='$idplan_pago'>
";
?>
    </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">DETALLE</label>
		    <input type="text" class="form-control" id="detalle" placeholder="Ingresar Algun Detalle Si Lo Hubiese" onkeyup="javascript:this.value=this.value.toUpperCase();">
		  </div>
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
      <input type="number" class="form-control" id="costodes" onKeyUp="Totalescostodes();" placeholder="Ingresar Monto en Bs.">
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

      <div class="modal-footer">
      	<div id="respuestaregistro"></div>
        <button type="button" class="btn btn-primary" id="reg_pagofin">GUARDAR</button>
        <!-- <button type="button" class="btn btn-primary">REGISTAR</button> -->
      </div>

    	</div>
    </div>
  </div>


</body>
</html>
<?php 
session_start();
$idempleado=$_SESSION['idempleado'];
include("libreria.php");
$cnx=conectar();
	$consulta1 = mysql_query("SELECT * FROM automovil 
                          WHERE estado='LIBRE' AND (chasis LIKE '%$valor%' or num_motor LIKE '%$valor%')");
$filas = mysql_num_rows($consulta1);
if ($filas>0) {
echo "
			  <table class='table table-bordered'>
			    <tr>
			    	<th>SELECIONAR</th>
			    	<th>N° CHASIS</th>
			    	<th>N° MOTOR</th>
			    	<th>MODELO</th>
			    	<th>COLOR</th>
			    </tr>";

while ($th=mysql_fetch_array($consulta1)) {
 	echo "
 	<tr>
       <td>
<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>VENDER</button>
       </td>
 	   <td>$th[1]</td>
 	   <td>$th[2]</td>
 	   <td>$th[4]</td>
 	   <td>$th[3]</td>
 	</tr>
 	";
 	$idautomovil=$th[0];
 } 
echo "</table>";
}else{
echo "<div class='alert alert-danger' role='alert'>NO SE ENCUENTRA NUNGUN VEHICULO CON ESE N° DE CHASIS/ N° MOTOR...</div>";
}
echo "
<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>TIPO VENTA</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
      <center>
       <a href='frm_detalle_venta_credito.php?idautomovil=$idautomovil&idcliente=$idcliente' class='btn btn-primary btn-lg'>CREDITO</a>
       <a href='frm_detalle_venta.php?idautomovil=$idautomovil&idcliente=$idcliente' class='btn btn-secondary btn-lg'>DIRECTA</a>
      </center>
      </div>
    </div>
  </div>
</div>
";

 ?>

    <script type="text/javascript">
    $(document).ready(function (){
        $("#guardar_venta").on("click", function (){
            $.ajax({ 
                url: 'reg_ventaa.php', 
                data: 'cod_cli='+$("#cod_cli").val()+
                '&precio_venta='+$("#precio_venta").val()+
                '&fecha_venta='+$("#fecha_venta").val()+
                '&tipo_venta='+$("#tipo_venta").val()+
                '&saldo='+$("#saldo").val()+
                '&antisipo='+$("#antisipo").val()+
                '&garantia='+$("#garantia").val()+
                '&entidad_financiera='+$("#entidad_financiera").val()+
                '&idcliente='+$("#idcliente").val()+
                '&idautomovil='+$("#idautomovil").val()+
                '&tipo_cambio='+$("#tipo_cambio").val(), 
                success: function(resp){ 
                    $('#respuesta_ven').html(resp) 
                    } 
                });
        });
    });

    </script>
<!-- <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>SELECCIONAR</button> -->
<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totales() {
   with (document.forms["frmv"]) // el nombre del formulario
   {
  var totalResult = Number( precio_venta.value ) / Number( tipo_cambio.value );
  //sumamos las cajas con los nombres
  venta_dolar.value = roundTo( totalResult, 2 );
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

<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totalesanti() {
   with (document.forms["frmv"]) // el nombre del formulario
   {
  var totalResult = Number( antisipo.value ) / Number( tipo_cambio.value );
  //sumamos las cajas con los nombres
  antisipo_dolar.value = roundTo( totalResult, 2 );
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

<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totalessaldo() {
   with (document.forms["frmv"]) // el nombre del formulario
   {
  var totalResult = Number( precio_venta.value ) - Number( antisipo.value );
  //sumamos las cajas con los nombres
  saldo.value = roundTo( totalResult, 2 );
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

<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totalessaldodolar() {
   with (document.forms["frmv"]) // el nombre del formulario
   {
  var totalResult = Number( saldo.value ) / Number( tipo_cambio.value );
  //sumamos las cajas con los nombres
  saldo_dolar.value = roundTo( totalResult, 2 );
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

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRO DE VENTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form name='frmv'>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">E.I.F./OFI</label>
<?php 
$consul=mysql_query("SELECT nombre, apellido FROM empleado WHERE idempleado='$idempleado'");
while ($tra=mysql_fetch_array($consul)) {
 echo "<input type='text' class='form-control' id='idempliado' value='$tra[0] $tra[1]' readonly>";
}
?>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">FECHA</label>
<?php 
$fecha=date('Y-m-d');
echo "<input type='text' class='form-control' id='fecha_venta' value='$fecha' readonly>";
?>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">CODIGO CLIENTE</label>
      <input type="text" class="form-control" id="cod_cli" placeholder="Ingresar Codigo Cliente" onkeyup="javascript:this.value=this.value.toUpperCase();">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">TIPO DE VENTA</label>
      <select id="tipo_venta" class="form-control">
        <option>CREDITO</option>
        <option>DIRECTA</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">T.C.</label>
      <input type="number" class="form-control" id="tipo_cambio" onKeyUp="Totales(); Totalesanti(); Totalessaldo(); Totalessaldodolar();" placeholder="Ingresar T.C.">
    </div>
  </div> 

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">PRECIO DE VENTA (Bs.)</label>
      <input type="number" class="form-control" id="precio_venta" onKeyUp="Totales(); Totalesanti(); Totalessaldo(); Totalessaldodolar()" placeholder="Ingresar Precio de Venta en Bs.">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">PRECIO DE VENTA ($)</label>
      <input type="number" class="form-control" id="venta_dolar" readonly>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ANTICIPO (Bs.)</label>
      <input type="number" class="form-control" id="antisipo" onKeyUp="Totalesanti(); Totalessaldo(); Totalessaldodolar(); Totales()" placeholder="Ingresar Anticipo en Bs.">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">ANTICIPO ($)</label>
      <input type="number" class="form-control" id="antisipo_dolar" readonly>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">SALDO (Bs.)</label>
      <input type="number" class="form-control" id="saldo" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">SALDO ($)</label>
      <input type="number" class="form-control" id="saldo_dolar" readonly>
    </div>
  </div>

     <div class="form-group">
        <label for="exampleFormControlInput1">GARANTIA</label>
        <input type="text" class="form-control" id="garantia" placeholder="Ingresar Garantia" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">ENTIDAD FINANCIERA</label>
        <input type="text" class="form-control" id="entidad_financiera" placeholder="Ingresar Entidad Financiera" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>
<?php 
echo "
<input type='hidden' id='idcliente' value='$idcliente'>
<input type='hidden' id='idautomovil' value='$idautomovil'>
";
?>

</form>

      </div>
      <div class="modal-footer">
        <div id="respuesta_ven">
          
        </div>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" id="guardar_venta">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
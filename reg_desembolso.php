<?php 
include("libreria.php");
$cnx=conectar();
if ($num_recibo=="" OR $costodes=="" OR $tipo_cambiodes=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO desembolso(monto,tipo_cambio,num_recivo,fecha,idventas) 
		     VALUES('$costodes','$tipo_cambiodes','$num_recibo','$fecha_des','$idventa')");
	if ($datos) {

?>
        <table class="table table-bordered sm">
          <tr>
            <th>N° RECIBO</th>
            <th>FECHA</th>
            <th>MONTO (Bs.)</th>
            <th>MONTO ($)</th>
            <th>ELIMINAR</th>
          </tr>
<?php 
$cona=mysql_query("SELECT * FROM desembolso WHERE idventas='$idventa'");
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
        <td><center><button type='button' id='borrar-$des[0]' class='btn btn-outline-danger'>X</button></center></td>
    </tr>
    ";
}
 ?>
        </table>
<?php

	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>
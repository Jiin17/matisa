<?php 
include("libreria.php");
$cnx=conectar();
if ($descripcion=="" OR $costo=="" OR $tipo_cambio=="") {
	echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO otrosgastos(descripcion,costo,tipo_cambio,idventas) 
		     VALUES('$descripcion','$costo','$tipo_cambio','$idventa')");
	if ($datos) {

?>
        <table class="table table-bordered sm">
          <tr>
            <th>DESCRIPCION</th>
            <th>COSTO (Bs.)</th>
            <th>COSTO ($)</th>
            <th>ELIMINAR</th>
          </tr>
<?php 
$cona=mysql_query("SELECT * FROM otrosgastos WHERE idventas='$idventa'");
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
        <td><center><button type='button' id='borrar-$qw[0]' class='btn btn-outline-danger'>X</button></center></td>
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
<?php 
include("libreria.php");
$cnx=conectar();
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
        <h5 class="modal-title" id="exampleModalLabel">STOCK VEHICULOS</h5>
      </div>
      <div class="modal-body">
<div class="table-responsive-sm" id="repuesta">
 <table class="table" border="2">
  <?php 
$consul=mysql_query("SELECT *
          FROM automovil a INNER JOIN tipo_veiculo tv ON tv.idtipo_veiculo=a.idtipo_veiculo  
          INNER JOIN marca m ON m.idmarca=a.idmarca 
          WHERE a.estado='LIBRE'");
while ($th=mysql_fetch_array($consul)) {
  echo "
     <tr><td rowspan='3'><img src='imagesautos/$th[7]' width='350px'></td>
     <td>N° CHASIS: $th[1]</td>
     <td>N° MOTOR: $th[2]</td>
     <td>MODELO: $th[4]</td>
     <td>COLOR: $th[3]</td>
     </tr><tr>
     <td>CILINDRADA: $th[8]</td>
     <td>AÑO: $th[9]</td>
     <td colspan='2'>TRACCION: $th[10]</td>
     </tr><tr>
     <td>MARCA: $th[17]</td>
     <td colspan='3'>TIPO VEHICULO: $th[15]</td></tr>
";
}
   ?>
</table>
<td colspan="2"></td>
</div>
<br>
<button type="button" class="btn btn-secondary" id="reg" onclick="imprimir();">cc/Arch</button>
</div>
</div>
</div>
 </body>
 </html>
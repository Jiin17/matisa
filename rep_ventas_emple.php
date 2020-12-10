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
        $("#fechfin").on("change", function (){//ID DEL BOTON 
            $.ajax({ 
                url: 'rep_ventas.php', //DONDE VA HA IR
                data: 'fechini='+$("#fechini").val()+'&fechfin='+$("#fechfin").val(),//ID DEL OBJETO QUE CONTIENE EL """DATO""" 
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
        <h5 class="modal-title" id="exampleModalLabel">REPORTE DE VENTA/S</h5>
        
   <a class="navbar-brand" href="#"><img src="images/LOGO.png" width="8%" align="right"></a>

      </div>  
      <div class="modal-body">

  <div class="form-row">
    <div class="col">
      <label for="inputAddress">FECHA INICIO</label>
      <input type="date" class="form-control" id="fechini">
    </div>
    <div class="col">
      <label for="inputAddress">FECHA FIN</label>
      <input type="date" class="form-control" id="fechfin">
    </div>
  </div>

<div class="table-responsive-sm" id="repuesta">
</div>
<br>
<button type="button" class="btn btn-secondary" id="reg" onclick="imprimir();">cc/Arch</button>
</div>
</div>
</div>
 </body>
 </html>

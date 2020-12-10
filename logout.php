<?php 
session_start();
session_unset();
session_destroy();

      echo "<div class='alert alert-success' role='alert'><center><h1>FIN DE SESION...</h1></center></div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='2; URL=index.php'>";

 ?>
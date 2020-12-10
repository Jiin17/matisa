<?php 
include("libreria.php");
$cnx=conectar();
if ($descrip_deta=="") {
	// echo "<div class='alert alert-danger' role='alert'>FALTA UN DATO IMPORTANTE...!</div>";
}else{
	$datos=mysql_query("INSERT INTO detalle_transac(detalle) 
		     VALUES('$descrip_deta')");
	if ($datos) {

echo "<select class='form-control' id='idtransaccion'>";

$hsh=mysql_query("SELECT * FROM detalle_transac");
while ($ds=mysql_fetch_array($hsh)) {
echo "<option value='$ds[0]'>$ds[1]</option>";
}
echo "
                  </select>
                  <span class='input-group-btn'>
<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModaledoc'>+</button>
                  </span>
";
	}else{
    	echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
	}
}

 ?>
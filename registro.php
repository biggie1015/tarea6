<?php
$mensaje = "";


$CI = & get_instance();

if($_POST){
	
	$datos = $_POST;
	$datos['ip']=($_SERVER['REMOTE_ADDR']);
	$CI->db->insert('tarea6',$datos);
    $mensaje="Datos recibido";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Registrate</title>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
	
	<div class="container">
	<h3><?php echo $mensaje;?></h3>
		<h3>Firma con Nosotros!</h3>
		<form method="post">
		<div class="row">
			<div class="col col-sm-6">
			
				<div class="form-group input-group">
					<span class="input-group-addon">Cedula</span>
					<input class="form-control" type="text" name="cedula">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Nombre</span>
					<input class="form-control" type="text" name="nombre">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Apellido</span>
					<input class="form-control" type="text" name="apellido">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Telefono</span>
					<input class="form-control" type="text" name="telefono">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">comentario</span>
				<textarea name="comentario" class="form-control"></textarea>
				</div>
				<div class="text-center">
					 <button class="btn btn-success"> Guardar</button>
				     <a href="<?php echo base_url('app') ?>" class="btn btn-info">Regresar</a>
				</div>
				
			</div>
		</div>
		<input type="hidden" name="log" id="log">
		<input type="hidden" name="lat" id="lat">
		</form>
		
	</div>
	
	<script>
	
	window.onload=function(){
		
		navigator.geolocation.getCurrentPosition(function(datos){
			document.getElementById('log').value=datos.coords.latitude;
			document.getElementById('lat').value=datos.coords.longitude;
		});
	}
	</script>
</body>
</html>
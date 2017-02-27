
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tarea 6</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	 
</head>
<body>
	
	<div class="container">
		<div>
	<H1>Lucha por tu pais!</H1>
	<div  id="map" style="width:500px; height:300px; background"></div>
	</div>
	<br>
	<a href="<?php echo base_url('app/registro'); ?>" class="btn btn-primary">Registrate</a>
	</div>
	
	<?php
	$CI =&get_instance();
	$query = $CI->db->query("select *from tarea6");
	$total=$query->num_rows();
	
	echo"<center><h2> Cantidad de firmas:<br>". $total;

	?>
	
	
	<script>

function initMap() {
  var myLatLng = {lat:18.45, lng: -69.66};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });
	

 <?php 
	$CI = & get_instance();
	$rs= $CI->db->query("select * from tarea6 order by id_user desc limit 10");
	
	$datos=$rs->result();
	foreach($datos as $persona){
		
		echo "
		  myLatLng = {lat:{$persona->log}, lng:{$persona->lat}};
		var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: 'Hello World!'
	  });
		";
	}
	
	?>
	
}

    </script>

	<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFKBo6ZEM0o8Rs6dCdWDLfMVX36si4TGo&callback=initMap"></script>
</body>
</html>
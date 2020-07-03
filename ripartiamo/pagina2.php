<?php
session_start();

if($_SESSION['pagina'] != "pagina2.php"){
  $location = 'https://' . $_SERVER['HTTP_HOST'] . '/ripartiamo/'.$_SESSION['pagina'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
}

include("configure.php");

if (isset($_SESSION['email']) && isset($_POST["attività"]) && substr_count($_POST["citta"], ",") <1){
echo '<script language="javascript">';
echo 'alert("Inserisci anche la città")';
echo '</script>';
}
else if (isset($_SESSION['email']) && isset($_POST["attività"]) && isset($_POST["citta"])) {
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error()); 

//$sql = "INSERT INTO tblsurvey VALUES ('ue', 'ue', '".$_POST['attività']."', '".$_POST['citta']."', '', '')";
$attività = $_POST['attività'];
$città = $_POST['citta'];
$mail = $_SESSION['email'];

 $sql = "UPDATE tblsurvey SET  Azienda = '".$_POST['attività']."', Citta = '".$_POST['citta']."' WHERE Mail = '$mail'";
if(! mysqli_query($conn, $sql))
  echo (mysqli_errno($conn).":". mysqli_error($conn));  
mysqli_close($conn);
$_SESSION['pagina'] = "pagina3.php";
header("location: pagina3.php");

} 

?>
<html lang="en">
<head>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src='https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='mapbox-gl-geocoder.css' type='text/css' />

<title>Attività</title>    
    
</head>
<body>

	<nav class="navbar navbar-light" >
  <a  href="http://ripartiamo.tech" >
    Ripartiamo.tech
  </a>
  </nav>

  <form action = "" method = "post" >
   
  <div class="form-group">
  <h2 style="padding-top: 20px; " class="Benvenuti">E qualche informazione sulla tua attività</h2>
  </div>
  <div class="form-group">
<input class="form-control" name="attività" type="text" required="required" placeholder="Nome attività">
</div>
 <div style="display:flex; flex-direction: row;" >
  <div id="geocoder" class="geocoder" ></div>
  <input type="hidden" name = "citta" id="citta" value="">
  </div>
<div id = "map-wrapper" class="Benvenuti">
<div id='map' style='width: 50%; height: 300px;box-shadow: 0 0 5px 5px #141414; ' class="Benvenuti"></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYmFjY29ucyIsImEiOiJjazl3anY2MTYwNmZuM2dvOGYycXFzZmszIn0.bkvb-_YhvhAFpGVC7jfusA';
var map = new mapboxgl.Map({
container: 'map',
language:'it',
style: 'mapbox://styles/baccons/ckagnx9620uwm1joe7t581sj4',
center: [10.5322176, 43.5614642], // Starting position [lng, lat]
    zoom: 8
});

var geocoder = new MapboxGeocoder({ // Initialize the geocoder
  accessToken: mapboxgl.accessToken, // Set the access token
  placeholder: 'Città',
  language:'it',
  
  mapboxgl: mapboxgl, // Set the mapbox-gl instance
  marker: false,
  types: 'country,region,place,postcode,locality,neighborhood'
});

document.getElementById('geocoder').appendChild(geocoder.onAdd(map));


geocoder.on('result', function(e) {
  var obj = JSON.stringify(e.result, ['place_name']);
document.getElementById("citta").value = JSON.parse(obj).place_name;
});


</script>

<label></label>
</div>
<div class="button">
    <button type="submit" class="btn btn-primary" style="">Avanti</button>
</div>



</form>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
</body>
</html>


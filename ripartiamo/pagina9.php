<?php
session_start();

if($_SESSION['pagina'] != "pagina9.php"){
  $location = 'https://' . $_SERVER['HTTP_HOST'] . '/ripartiamo/'.$_SESSION['pagina'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
}

include("configure.php");

if (isset($_SESSION['email']) && isset($_POST["fondi"])) {
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error()); 

$mail = $_SESSION['email'];
//$sql = "INSERT INTO tblsurvey (Quarantena) VALUES '".$_POST['emergenza']."'";
 $sql = "UPDATE tblsurvey SET  Fondi = '".$_POST['fondi']."' WHERE Mail = '$mail'";
if(! mysqli_query($conn, $sql))
  echo (mysqli_errno($conn).":". mysqli_error($conn));  
mysqli_close($conn);
$_SESSION['pagina'] = "pagina10.php";
header("location: pagina10.php");
// Da caricare sul sito ancora
} 


?>
<html lang="en">
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Attività</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="style.css">

</head>
<body>

  <nav class="navbar navbar-light">
  <a  href="ripartiamo.tech" >
    Ripartiamo.tech
  </a>
  </nav>

  <form action = "" method = "post" >
   

<div class="form-group" id = "social">
      <h2 class="mr-sm-2" >
Sei riuscito ad accedere ai fondi pubblici per questa emergenza?</h2>
</div>
 <div class="list-group" id = "myDIV">
  <a href="#" class="list-group-item list-group-item-action" onclick="myfunc(this)" name="Si" >Si</a>
  <a href="#" class="list-group-item list-group-item-action" onclick="myfunc(this)" name="No" >No</a>
  <a href="#" class="list-group-item list-group-item-action" onclick="myfunc(this)" name="Parzialmente" >Parzialmente</a>
  <a href="#" class="list-group-item list-group-item-action"onclick="myfunc(this)" name="Niente" >Nessuna risposta</a>
  <input type="hidden" name="fondi" id= "input"value="">
</div>
    <div class="form-group">
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary" id="mybutton">Avanti</button>
    </div>
  </div>
</form>
<script type="text/javascript">
  
var btnContainer = document.getElementById("myDIV");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("list-group-item list-group-item-action");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");

    // If there's no active class
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("input").value = this.getAttribute("name");
  });
} 

</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
</body>
</html>

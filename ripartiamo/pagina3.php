<?php
session_start();

if($_SESSION['pagina'] != "pagina3.php"){
  $location = 'https://' . $_SERVER['HTTP_HOST'] . '/ripartiamo/'.$_SESSION['pagina'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
}

include("configure.php");

if (isset($_SESSION['email']) && isset($_POST["settore"]) && isset($_POST["dipendenti"]) && isset($_POST['sito'])) {

$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error()); 

$mail = $_SESSION['email'];

 $sql = "UPDATE tblsurvey SET  Settore = '".$_POST['settore']."', n_dip = '".$_POST['dipendenti']."', Sito = '".$_POST['sito']."' WHERE Mail = '$mail'";
if(! mysqli_query($conn, $sql))
  echo (mysqli_errno($conn).":". mysqli_error($conn));  
mysqli_close($conn);
$_SESSION['pagina'] = "pagina4.php";
header("location: pagina4.php");
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

	<nav class="navbar navbar-light" >
  <a href="http://ripartiamo.tech" >
    Ripartiamo.tech
  </a>
  </nav>

  <form action = "" method = "post" >
    <div class="form-group">
    <div class="col-auto my-1">
      <div class="form-group" id = "settore">
      <h3 class="mr-sm-2" for="inlineFormCustomSelect" >
In che settore si svolge la tua attività?
</h3>
</div>
      <div class="form-group">

      <select name="settore" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
        <option value = "" selected>Scegli settore</option>
        <option value="Agricoltura">Agricoltura</option>
        <option value="Arte/Sport/Intrattenimento">Arte / Spot / Intrattenimento</option>
        <option value="Assicurazioni/Finanza">Assicurazioni / Finanza</option>
        <option value="Commercio">Commercio</option>
        <option value="Costruzioni">Costruzioni</option>
        <option value="Istruzione">Istruzione</option>
        <option value="Noleggio/Agenzia viaggio">Noleggio / Agenzia viaggio</option>
        <option value="Ristorazione">Ristorazione</option>
        <option value="Sanità">Sanità</option>
        <option value="Servizi">Servizi</option>
        <option value="Trasporto/Magazzinaggio">Trasporto / Magazzinaggio</option>
        <option value="Turismo">Turismo</option>
        <option value="Vendita al dettaglio">Vendita al dettaglio</option>    
        <option value="Altro">Altro</option>
      </select>
<div class="form-group" id = "Dipendenti">
      <h3 class="mr-sm-2" for="inlineFormCustomSelect" >
E di quanti dipendenti si compone?
</h3>
</div>
 <div class="list-group" id = "myDIV">
  <a href="#" class="list-group-item list-group-item-action" onclick="myfunc(this)" name="<5" > < 5 </a>
  <a href="#" class="list-group-item list-group-item-action" onclick="myfunc(this)" name="5-20" > 5 - 20</a>
  <a href="#" class="list-group-item list-group-item-action" onclick="myfunc(this)" name="21-100" > 21 - 100 </a>
  <a href="#" class="list-group-item list-group-item-action"onclick="myfunc(this)" name=">100" > > 100 </a>
  <input type="hidden" name="dipendenti" id= "input"value="">
</div>
<div class="form-group">
  <h3 id="sito">Inserisci il sito internet, se ne possiedi uno (Facoltativo)</h3>
  </div>
  <div class="form-group">
<input class="form-control" name="sito" type="text" value = ""placeholder="www.sitointernet.it">
</div>
      </div>
    </div>
    
    
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">Avanti</button>
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

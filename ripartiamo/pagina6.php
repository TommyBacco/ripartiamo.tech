<?php
session_start();

if($_SESSION['pagina'] != "pagina6.php"){
  $location = 'https://' . $_SERVER['HTTP_HOST'] . '/ripartiamo/'.$_SESSION['pagina'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
}

include("configure.php");

if (isset($_SESSION['email']) && isset($_POST["Fatturato"]) && isset($_POST["Liquidità"]) && isset($_POST["Linee"]) && isset($_POST["Lavoratori"]) && isset($_POST["Trasporti"]) && isset($_POST["Rifornimenti"])) {

$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error()); 

$mail = $_SESSION['email'];
$Fatturato = $_POST['Fatturato'];


 $sql = "UPDATE tblsurvey SET  Fatturato = '".$_POST['Fatturato']."', Liquidita = '".$_POST['Liquidità']."',Linee = '".$_POST['Linee']."', Lavoratori = '".$_POST['Lavoratori']."', Trasporti = '".$_POST['Trasporti']."', Rifornimenti = '".$_POST['Rifornimenti']."' WHERE Mail = '$mail'";
if(! mysqli_query($conn, $sql))
  echo (mysqli_errno($conn).":". mysqli_error($conn));  
mysqli_close($conn);
$_SESSION['pagina'] = "pagina7.php";
header("location: pagina7.php");
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
  <a  href="http://ripartiamo.tech" >
    Ripartiamo.tech
  </a>
  </nav>

  <form action = "" method = "post" >
    <div class="form-group" >
      <h2 id="label" >Inserisci valori da 1 a 5 a seconda di quanto consideri gravi le sequenti criticità</h2>
       <div class="list-group" >
        <label style="padding-top: 10px;">Fatturato</label>
 <div id = "divRadio">
     <div class="list-group" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary" value = "1">
              1
                </label>
                <label class="btn btn-secondary" value = "2">
               2
                </label>
                <label class="btn btn-secondary" value = "3">
               3
                </label>
                <label class="btn btn-secondary" value = "4">
               4
                </label>
                <label class="btn btn-secondary" value = "5">
               5
                </label>

        </div>  
         <input type="hidden" id="Fatturato" name="Fatturato" value="">

        </div>
    </div>
</div>

<div class="list-group" >
        <label  >Liquidità</label>
 <div id = "divRadio2">
     <div class="list-group" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary" value = "1">
              1
                </label>
                <label class="btn btn-secondary" value = "2">
               2
                </label>
                <label class="btn btn-secondary" value = "3">
               3
                </label>
                <label class="btn btn-secondary" value = "4">
               4
                </label>
                <label class="btn btn-secondary" value = "5">
               5
                </label>

        </div>  
         <input type="hidden" id="Liquidità" name="Liquidità" value="">

        </div>
    </div>
</div>
<div class="list-group" >
        <label  >Linee di credito/mutui</label>
 <div id = "divRadio3">
     <div class="list-group" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary" value = "1">
              1
                </label>
                <label class="btn btn-secondary" value = "2">
               2
                </label>
                <label class="btn btn-secondary" value = "3">
               3
                </label>
                <label class="btn btn-secondary" value = "4">
               4
                </label>
                <label class="btn btn-secondary" value = "5">
               5
                </label>

        </div>  
         <input type="hidden" id="Linee" name="Linee" value="">

        </div>
    </div>
</div>
<div class="list-group" >
        <label  >Lavoratori e collaboratori</label>
 <div id = "divRadio4">
     <div class="list-group" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary" value = "1">
              1
                </label>
                <label class="btn btn-secondary" value = "2">
               2
                </label>
                <label class="btn btn-secondary" value = "3">
               3
                </label>
                <label class="btn btn-secondary" value = "4">
               4
                </label>
                <label class="btn btn-secondary" value = "5">
               5
                </label>

        </div>  
         <input type="hidden" id="Lavoratori" name="Lavoratori" value="">

        </div>
    </div>
</div>
<div class="list-group" >
        <label >Trasporti</label>
 <div id = "divRadio5">
     <div class="list-group" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary" value = "1">
              1
                </label>
                <label class="btn btn-secondary" value = "2">
               2
                </label>
                <label class="btn btn-secondary" value = "3">
               3
                </label>
                <label class="btn btn-secondary" value = "4">
               4
                </label>
                <label class="btn btn-secondary" value = "5">
               5
                </label>

        </div>  
         <input type="hidden" id="Trasporti" name="Trasporti" value="">

        </div>
    </div>
</div>

<div class="list-group" >
        <label >Rifornimenti</label>
 <div id = "divRadio6">
     <div class="list-group" >
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                <label class="btn btn-secondary" value = "1">
              1
                </label>
                <label class="btn btn-secondary" value = "2">
               2
                </label>
                <label class="btn btn-secondary" value = "3">
               3
                </label>
                <label class="btn btn-secondary" value = "4">
               4
                </label>
                <label class="btn btn-secondary" value = "5">
               5
                </label>

        </div>  
         <input type="hidden"  id="Rifornimenti" name="Rifornimenti" value="">

        </div>
    </div>
</div>
<div class="button">
      <button id = "mioButton" type="submit" style = "" class="btn btn-primary">Avanti</button>
    </div>

</div>
  

  </div>
 
    


</form>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script type="text/javascript">
  
var btnContainer = document.getElementById("divRadio");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("btn btn-secondary");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = btnContainer.getElementsByClassName("active");

    // If there's no active class
    if (current.length > 0 ) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("Fatturato").value = this.getAttribute("value");
  });
} 

var btnContainer2 = document.getElementById("divRadio2");

// Get all buttons with class="btn" inside the container
var btns2 = btnContainer2.getElementsByClassName("btn btn-secondary");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns2.length; i++) {
  btns2[i].addEventListener("click", function() {
    var current2 = btnContainer2.getElementsByClassName("active");

    // If there's no active class
    if (current2.length > 0 ) {
      current2[0].className = current2[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("Liquidità").value = this.getAttribute("value");
  });
} 

var btnContainer3 = document.getElementById("divRadio3");

// Get all buttons with class="btn" inside the container
var btns3 = btnContainer3.getElementsByClassName("btn btn-secondary");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns3.length; i++) {
  btns3[i].addEventListener("click", function() {
    var current3 = btnContainer3.getElementsByClassName("active");

    // If there's no active class
    if (current3.length > 0 ) {
      current3[0].className = current3[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("Linee").value = this.getAttribute("value");
  });
} 

var btnContainer4 = document.getElementById("divRadio4");

// Get all buttons with class="btn" inside the container
var btns4 = btnContainer4.getElementsByClassName("btn btn-secondary");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns4.length; i++) {
  btns4[i].addEventListener("click", function() {
    var current4 = btnContainer4.getElementsByClassName("active");

    // If there's no active class
    if (current4.length > 0 ) {
      current4[0].className = current4[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("Lavoratori").value = this.getAttribute("value");
  });
} 

var btnContainer5 = document.getElementById("divRadio5");

// Get all buttons with class="btn" inside the container
var btns5 = btnContainer5.getElementsByClassName("btn btn-secondary");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns5.length; i++) {
  btns5[i].addEventListener("click", function() {
    var current5= btnContainer5.getElementsByClassName("active");

    // If there's no active class
    if (current5.length > 0 ) {
      current5[0].className = current5[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("Trasporti").value = this.getAttribute("value");
  });
} 

var btnContainer6 = document.getElementById("divRadio6");

// Get all buttons with class="btn" inside the container
var btns6 = btnContainer6.getElementsByClassName("btn btn-secondary");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns6.length; i++) {
  btns6[i].addEventListener("click", function() {
    var current6= btnContainer6.getElementsByClassName("active");

    // If there's no active class
    if (current6.length > 0 ) {
      current6[0].className = current6[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
    document.getElementById("Rifornimenti").value = this.getAttribute("value");
  });
} 


</script>

</body>
</html>

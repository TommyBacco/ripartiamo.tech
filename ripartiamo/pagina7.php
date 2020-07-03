<?php
session_start();

if($_SESSION['pagina'] != "pagina7.php"){
  $location = 'https://' . $_SERVER['HTTP_HOST'] . '/ripartiamo/'.$_SESSION['pagina'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
}

include("configure.php");

if (isset($_SESSION['email']) && isset($_POST["Rete"])) {

$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error()); 

$mail = $_SESSION['email'];


 $sql = "UPDATE tblsurvey SET  Rete = '".$_POST['Rete']."' WHERE Mail = '$mail'";
if(! mysqli_query($conn, $sql))
  echo (mysqli_errno($conn).":". mysqli_error($conn));  
mysqli_close($conn);
$_SESSION['pagina'] = "pagina8.php";
header("location: pagina8.php");
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
    <div class="form-group" >
      <h2 id="label" >Da 1 a 5 quanto ritieni utile entrare in una rete di impresa?</h2>
       <div class="list-group" >
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
         <input type="hidden" id="Rete" name="Rete" value="">

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
    document.getElementById("Rete").value = this.getAttribute("value");
  });
} 

</script>

</body>
</html>
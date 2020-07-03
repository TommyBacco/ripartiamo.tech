<?php
session_start();

if($_SESSION['pagina'] != "pagina1.php"){
  $location = 'https://' . $_SERVER['HTTP_HOST'] . '/ripartiamo/'.$_SESSION['pagina'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
}


include("configure.php");
if (isset($_POST["nome"]) && isset($_POST["email"])){
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error()); 
mysqli_autocommit($conn, true);
$nome = mysqli_real_escape_string($conn,$_POST['nome']);
$email =mysqli_real_escape_string($conn,$_POST['email']);
$db = DB_DATABASE;
/*$sql = "SELECT MAX(ID) FROM tblsurvey";
$ris = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($ris);
mysqli_free_result($ris);
$id =  (int)$row[0] + 1;*/
$sql2 = "INSERT INTO tblsurvey (Nome, Mail) VALUES( '$nome', '$email')";
$ris2 = mysqli_query($conn, $sql2);  
$_SESSION['email'] = $email;
/* determine our thread id */
$thread_id = mysqli_thread_id($conn);
/* Kill connection */
mysqli_kill($conn, $thread_id);
mysqli_close($conn);

//$_SESSION['nome'] = $_POST['nome'];
//$_SESSION['email'] = $_POST['email'];
$_SESSION['pagina'] = "pagina2.php";
header("location: pagina2.php");

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
  <a class="navbar-brand" href="http://ripartiamo.tech" style="color: white;">
    Ripartiamo.tech
  </a>
  </nav>

  <form action = "" method = "post" >
   
  <div class="form-group" class="Benvenuti">
  <h2 style="padding-top: 15px; color: #7494A8;" >Qualche informazione su di te</h2>
  </div>
  <div class="form-group">
<input class="form-control" name="nome" type="text" required="required" placeholder="Nome e cognome">
</div>

<div class="form-group">
    <input type="email" name="email" required="required" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"><br>
    <small id="emailHelp" class="form-text text-muted">Premendo 'avanti' dichiari di aver visualizzato la nostra <a href="http://www.ripartiamo.tech/ourpolicy.html" style="color: blue;">policy</a> sulla privacy.</small>
  </div>
<div class="button">
    <button type="submit" class="btn btn-primary" style="">Avanti</button>
</div>
<?php 
?>
</form>
<script data-goatcounter="https://1984.goatcounter.com/count"
            async src="//gc.zgo.at/count.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php
header("pagina1.php")
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Scrolling Nav - Start Bootstrap Template</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">


  <!-- Custom styles for this template -->
  <link href="scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">
  
<form action="" method="post">
  <header class="bg-primary text-black" style="background-color: #007bff;">
    <div class="container text-center">
      <h1>Benvenuti al sondaggio di Ripartiamo.it!</h1>
      <p class="lead">Il nostro progetto per aiutare le aziende a ripartire</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Aiutaci!</h2>
          <p class="lead">Le tue sensazioni e le tue esperienze sono uno strumento molto forte per permetterci di aiutarti! Compila il sondaggio e aiutaci a capire come aiutarti.</p>
        </div>
        <div class="buttonIndex">
  <button type="submit" name="bottone" class="btn btn-primary">Inizia
</button>
</div>
      </div>
    </div>
  </section>


</form>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
 <div id="cookieConsent">
    Questo sito utilizza soltanto first-party cookies. Leggi la nostra <a href="http://ripartiamo.tech/ourpolicy.html" style="color: blue;">policy</a> sulla privacy <a class="cookieConsentOK">Ho capito</a>
</div>
</body>

<script type="text/javascript">
	
	$(document).ready(function(){   
    setTimeout(function () {
        $("#cookieConsent").fadeIn(400);
     }, 1000);
    $("#closeCookieConsent, .cookieConsentOK").click(function() {
        $("#cookieConsent").fadeOut(400);
    }); 
}); 

</script>

</html>

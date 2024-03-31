<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja stránka</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/accordion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php  
  $file_path = "parts/header.php"; 
  if(!include($file_path)) 
  {     
    echo"Failed to include $file_path";
  } 
  ?>

  <main>
    <section class="banner">
      <div class="container text-white">
        <h1>Kontakt</h1>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="col-100 text-center">
          <p><strong><em>Máte akukolvek otázku? Neváhajte sa spytať!</em
          ></strong></p>
        </div>
      </div>
    </section>
    <section class="container back-black">
      <div class="row">
        <div class="col-50"> 
          <h3>Máte otázky?</h3>
          <p>Ak máte otázku tak možte vyplniť formular na pravo a my sa vám pokusime odpovedať ako najskôr.</p> 
          <div class="accordion">
            <div class="question">Ano?</div>
            <div class="answer">Ano.</div>
          </div>
          <div class="accordion">
            <div class="question">Ano?</div>
            <div class="answer">Nie.</div>
          </div>
          <div class="accordion">
            <div class="question">Ano?</div>
            <div class="answer">¯\_(ツ)_/¯</div>
          </div>
        </div>

        <div class="col-50 text-right">
          <h3>Napíšte nám</h3>
          <form id="contact" action="thankyou.html">
            <input type="text" placeholder="Vaše meno" id="meno" required><br>
            <input type="email" placeholder="Váš email" id="email" required><br>
            <textarea name="" id="sprava" placeholder="Vaša správa"></textarea><br>
            <input type="checkbox" name="" id="cek" required>
            <label for="">Súhlasím so spracovaním osobných udajov.</label><br>
            <input type="submit" value="Odoslať">
          </form>
        </div>
      </div>
    </section>
  </main>
  <?php  
  $file_path = "parts/footer.php"; 
  if(!include($file_path)) 
  {     
    echo"Failed to include $file_path";
  } 
  ?>
  <script src="js/alert.js"></script>
  <script src="js/menu.js"></script>
  <script src="js/accordion.js"></script>
</body>
</html>
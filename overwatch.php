<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlizzHead</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php  
  include_once "parts/header.php";
  include_once "functions.php";
  include_once "parts/nav.php";
  ?>
  <main>
    <section class="banner">
      <div class="container text-white">
        <h1>Overwatch</h1>
      </div>
    </section>
    <section class="container">
      <div class="row">
        <div class="col-100 text-center">
          <p><strong><em>Overwatch je multimediálna séria zameraná na sériu online multiplayerových strieľačiek z pohľadu prvej osoby</em></strong></p>
        </div>
      </div>
    </section>
    <section class="container back-black">
      <div class="row">
        <div class="col-6">
          <h2>Historia a súčastnosť hry Overwatch</h2>
          <img src="img/owlogo.png" height="175px" class="img-fluid" >
        </div>
        <div class="col-6 odsek">
          <p>Overwatch bol vydaný v roku 2016 a následovne v roku 2022 bolo vydané pokračovanie Overwatch 2. Oboje hra obsahuju hrdinovo-založeny boj medzi dvoma timmi hračov, deliace sa medzi množstvno cielov.</p>
          <p>Pri vydaní hry v roku 2016 hre chybal akykolvek príbehový mód tak sa blizzard rozhodol použiť transmediálne rozprávanie príbehov na rozložinie pribehu týkajucich sa jednotlivych charakterov či udalosti vo svete, použili napriklad komixi a dokonca aj animovane media kde vznikly kratke animovane filmy.</p>
        </div>
      </div>
    </section>

  </main>
  <?php   
  include_once "parts/footer.php";
  ?>
<script src="js/menu.js"></script>
</body>
</html>
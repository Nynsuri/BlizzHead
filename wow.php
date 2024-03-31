<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja stránka</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/banner.css">
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
        <h1>World of Warcraft</h1>
      </div>
    </section>
    <section class="container">
      <div class="row">
        <div class="col-100 text-center">
          <p><strong><em>World of Warcraft je MMORPG počítačová hra vydaná spoločnosťou Blizzard Entertainment a je už štvrtou hrou z Warcraft univerza. </em></strong></p>
        </div>
      </div>
    </section>
    <section class="container back-black">
      <div class="row">
        <div class="col-6">
          <h2>Historia univerza World of Warcraft a súčastnosť</h2>
          <img src="img/wowlogo.png" height="200px" class="img-fluid">
        </div>
        <div class="col-6 odsek">
          <p>Warcraft univerzum bolo ako prve vytvorene blizzard entertainment a to v hre Warcraft: Orcs & Humans vydaná v roku 1994, ktora bolo strategia z vrchného pohladu, kde následovne sa pribeh posuval do Warcraft II: Tides of Darkness vydaná v roku 1995 a nakoniec dokonale vyvrcholenie a tá najpopularnejšia zo všektych bola Warcraft III: Reign of Chaos vydaná v roku 2002 kde neskôr v roku 2003 dostala svoj datadisk s nazvom The Frozen Throne.</p>
          <p>Ale vec čo cele universum preniesla na ďalšiu úroveň bolo vydanie v roku 2004 a to bolo World of Warcraft, ktorú si nespočetne veľa ludi po celéj planete ihned zašlo zahrať. A s týmto uspechom dostali dostatotok informacii že to bolo spravne rozhodnutie a tak pokračovali až do dnes kde každe 2 roky vychádzal novy datadisk. Samozrejme nie každý bol dokonalým uspechom, boli aj prepadáky ale aj legendarne časti ktoré sa zarili ludom do hlavy až do teraz.</p>
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
<script src="js/menu.js"></script>
</body>
</html>
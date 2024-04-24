<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php  
  include_once "parts/header.php";
  include_once "functions.php";
  include_once "parts/nav.php";
 
  ?>
    
    <main>
      <section class="slides-container">
     
         <div class="slide fade">
         <img src="img/banner1.jpeg">
         <div class="slide-text-blizz">
           Blizzard Entertainment
         </div>
       </div>
       
       <div class="slide fade">
         <img src="img/banner2.jpeg">
         <div class="slide-text-wow">
           World of Warcraft
         </div>
       </div>
       
       <div class="slide fade">
         <img src="img/banner3.jpeg">
         <div class="slide-text-ow">
           Overwatch
         </div>
       </div>
       
       <a id="prev" class="prev">❮</a>
       <a id="next" class="next">❯</a>
       
        
      </section>
      <section class="container">
        <div class="row">
          <div class="col-100 text-center text-white">
              <p><strong><em>Blizzard Entertainment je americký producent a distribútor počítačových hier. Od vydania Warcraft: Orcs & Humans v roku 1994 je jedným z najúspešnejších herných vývojárov na svete.</em></strong></p>
          </div>
        </div>
      </section>
      <section class="container back-black">
        <div class="row">
          <div class="col-md-4">
            <h2>Viac informacii o firme <a href="https://www.youtube.com/watch?v=Sagg08DrO5U&" class="blizz" target="_blank">Blizzard</a> Entertainment</h2>
            <img src="img/blizzlogo.png" height="175px" class="img-fluid">
          </div>
          <div class="col-md-4 odsek">
            <p>Centrála sídli v meste Irvine v štáte Kalifornia, USA. Spoločnosť je známa tým, že svoje hry vydáva v dlhých časových intervaloch, často i roky po ich ohlásení, s cieľom zabezpečiť ich čo možno najlepšiu kvalitu. Aj vďaka tomu má Blizzard reputáciu ako firma produkujúca hry, ktoré sa stávajú klasikami svojho žánru a hrávajú sa ešte roky po vydaní.</p>
            <p>Ale po roku 2008 keď firmu odkupil Activision, kde následovne firma bola takzvane vyšťavena všetkeho nadšenia do vytvarania hier pre fanušikov a zábavu. A na miesto toho začali sa orientovať čisto na zisk, kde do jedneho z titulov vložili herny obchod kde si hrači mohli zakúpiť kozmeticke predmety do hry a v moment čo si uvedomil Activision, že jeden predmet dokázaj mať väčši vydavok ako jeden z ich vtedy hlavnych titulov, sa rozhodli len touto cestou pokračovať.</p>
          </div>
        </div>
      </section>
    </main>
    
    <?php  
include_once "parts/footer.php";
  ?>

    <script src="js/menu.js"></script>
    <script src="js/slider.js"></script>
</body>
</html>
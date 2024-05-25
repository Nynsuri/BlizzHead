<?php  
include_once "parts/header.php";
include_once "functions.php";
include_once "parts/nav.php";
include_once "classes/Otazky.php";
$qna = new Otazky\QnA();
$qna->handleFormSubmission(); // Handle form submissions
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
          <?php
           $qna->displayQnA();
           
          ?>
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
include_once "parts/footer.php";
?>
<script src="js/alert.js"></script>
<script src="js/menu.js"></script>
<script src="js/accordion.js"></script>

</body>
</html>

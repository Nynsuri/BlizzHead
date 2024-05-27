<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php 
include_once "parts/header.php";
include_once "functions.php";
include_once "parts/nav.php";
include_once "classes/Otazky.php";
$qna = new Otazky\QnA();
$qna->handleFormSubmission(); 
?>

    <main style="background-color: rgb(8, 8, 8);">
        <section class="banner">
            <div class="container text-white">
                <h1>Kontakt</h1>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10 text-center">
                        <p><strong><em>Máte akukolvek otázku? Neváhajte sa spytať!</em></strong></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container text-white" style="background-color: rgb(8,8,8);">
            <div class="row">
                <div class="col">
                    <h3 class="mt-4">Máte otázky?</h3>
                    <p>Ak máte otázku, môžete vyplniť formulár na pravo a my sa vám pokúsime odpovedať čo najskôr.</p>
                    <?php $qna->displayQnA(); ?>
                </div>
                <div class="col">
                    <h3 class="mt-4">Pridanie otazky</h3>
                    <form method="post">
                        <div class="mb-3">
                            <label for="otazka" class="form-label">Otázka:</label>
                            <textarea class="form-control" name="otazka" id="otazka" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="odpoved" class="form-label">Odpoveď:</label>
                            <textarea class="form-control" name="odpoved" id="odpoved" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="action" value="create" class="btn btn-primary">Odoslať</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include_once "parts/footer.php"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
session_start();
include "inc/functions.php";
include "inc/header.php";
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-4">
            <h2>Merci pour votre commande</h2>
            <p>Votre commande a bien été enregistrée</p>
            <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
        </div>
    </div>
</div>
<?php
include "inc/footer.php";
?>
<?php 
session_start();
if(!isset($_SESSION['nom'])){
  header('location:connexion.php');
}
include "../inc/functions.php";
include "template/header.php";
$produits = getAllProducts($conn);
$Users = getAllUsers($conn);
$Commandes = getAllCommandes($conn);
$TotalCommandes = count($Commandes);
$TotalUsers = count($Users);
$TotalPorduits = count($produits);
?>
<div class="container-fluid">
    <div class="row">
        <?php
        include "template/navigation.php";
        ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Espace Admin</h1>
                <p class="text-white">Bienvenue <?php print $_SESSION['nom']; ?></p>

            </div>
            <div class="row justify-content-center">
              <div class="col-3">
                <div class="card admin-stats">
                  <div class="card-body">
                    <div class="card-title">
                      <i data-lucide="package-search" ></i>
                      <div class="title">Les produits </div>
                    </div>
                    <div class="total"><?php echo $TotalPorduits; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card admin-stats">
                  <div class="card-body">
                    <div class="card-title">
                      <i data-lucide="package-search" ></i>
                      <div class="title">Les utilisateurs </div>
                    </div>
                    <div class="total"><?php echo $TotalUsers; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card admin-stats">
                  <div class="card-body">
                    <div class="card-title">
                      <i data-lucide="package-search" ></i>
                      <div class="title">Les commandes </div>
                    </div>
                    <div class="total"><?php echo $TotalCommandes; ?></div>
                  </div>
                </div>
              </div>

        </main>
    </div>
</div>
<div class="bg-dark text-center p-5 mt-4">
    <p class="text-white">
        Tous les droits réservés 2024
    </p>

</div>



<?php
include "template/footer.php";
?>
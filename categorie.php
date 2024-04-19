<?php

session_start();

include "inc/functions.php";
$produits = getProduitByCategorie($conn, $_GET['id']);
$CurrentCategorie = getCategorieById($conn, $_GET['id']);

if (isset($_POST['search']) && !empty($_POST['search'])) {


  $produit = searchProduits($conn, $_POST['search']);
} else {
  $produit = getAllProducts($conn);
}

include "inc/header.php";

?>
<section class="hero">
  <div class="container d-flex align-items-center">
    <div class="col-lg-6">
      <h1>Let's make <br> beautiful flowers a part of your life.</h1>
      <p>Flowers are the music of the ground. From earth's lips spoken without sound.</p>
      <button class="btn btn-primary">Shop Now</button>
    </div>
    <div class="col-lg-6 text-center">
      <img src="images/hero-asset.png" alt="hero" class="img-fluid w-50 ">
    </div>
  </div>
</section>
<section class="products">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center"><?php echo $CurrentCategorie['nom']; ?></h2>
        <p class="text-center"><?php echo $CurrentCategorie['description']; ?></p>
      </div>
    </div>
    <div class="row">
      <?php
      foreach ($produits as $produit) {
      ?>
        <div class="col-lg-3">
          <div class="product">
            <img src="images/<?php print $produit['image']; ?>" alt="product" class="img-fluid">
            <h3><?php print $produit['nom']; ?></h3>
            <p><?php print $produit['prix']; ?>$</p>
            <a href="produit.php?id=<?php print $produit['id']; ?>" class="btn btn-primary">View</a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
<?php
include "inc/footer.php";


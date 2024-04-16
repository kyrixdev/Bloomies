<?php

session_start();

include "inc/functions.php";

$categories = getAllCategories($conn);

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
<div class="features">
  <div class="container">
    <div class="d-flex justify-content-center py-5 gap-4">
      <div class="col d-flex align-items-center gap-3 feature">
        <i data-lucide="flower-2" width="80" height="80" stroke-width="1"></i>
        <div class="d-flex flex-column">
          <h4>Floral range</h4>
          <p>Get wide arrangement of colorful florals in your bouquets</p>
        </div>
      </div>
      <div class="col d-flex align-items-center gap-3 feature">
        <i data-lucide="scissors" width="80" height="80" stroke-width="1"></i>
        <div class="d-flex flex-column">
          <h4>Hand crafted</h4>
          <p>All the floral arrangement are crafted with human touch</p>
        </div>
      </div>
      <div class="col d-flex align-items-center gap-3 feature">
        <i data-lucide="gift" width="80" height="80" stroke-width="1"></i>
        <div class="d-flex flex-column">
          <h4>Secure packing</h4>
          <p>We hold the plants and let them breathe</p>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="categories container">
  <h2 class="text-center">Categories</h2>
  <p class="text-center">Choose from our wide range of categories</p>
  <div class="row col-12 mt-4">
  <?php

  foreach ($categories as $categorie) {

    print '<div class="col-3 mt-2">
  <a href="produit.php?id=' . $categorie['id'] . '" class="card product-home" style="width: 18rem;">
      <img src="images/' . $categorie['image'] . '" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">' . $categorie['nom'] . '</h5>
        <p class="card-text"> ' . $categorie['description'] . '</p>
      </div>
    </a>
  </div>';
  }

  ?>
  </div>
</section>

  <?php

  include "inc/footer.php"


  ?>
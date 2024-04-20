<?php
session_start();
include "inc/functions.php";

$categories= getAllCategories($conn);



if(isset ($_GET['id'])){
   $produit= getProduitBYID($conn,$_GET['id']);
}
include "inc/header.php";

?>
<div class="container">
  <div class="row col-12 mt-4 product-card">
      <div class="row col-6 mt-4">
        <img src="images/<?php echo $produit['image']; ?>" class="img-thumbnail mx-auto" style="width: 59%;">
      </div>
      <div class="row col-6 mt-4">
        <h2><?php echo $produit['nom']; ?></h2>
        <p><?php echo $produit['description']; ?></p>
        <p class="prix">Prix: <?php echo $produit['prix']; ?><span> DT </span></p>
        <form action="actions/commander.php" method="POST">
          <div class="row align-items-center">
            <div class="form-group col-6">
              <label for="qte">Quantité</label>
              <input type="number" class="form-control col-2" name="qte" value="1">
            </div>
            <div class="col-6">
                <input type="hidden" name="prix" value="<?php echo $produit['prix']; ?>">
                <input type="hidden" name="produit" value="<?php echo $produit['id']; ?>">
                <button type="submit" class="btn btn-shop mt-2">Ajouter au panier</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

    
<div class="container py-5">
  <div class="title">
    <h2 class="text-center">Produits similaires</h2>
  </div>
  <div class="row py-5 mx-auto justify-content-center">
    <?php 
    $CurrentProduct = $produit['id'];
    $produits = getProduitByCategorie($conn, $produit['categorie']);
    foreach($produits as $produit){
      if($produit['id'] != $CurrentProduct){
    ?>
    <div class="col-lg-3">
      <div class="product">
        <img src="images/<?php print $produit['image']; ?>" alt="product" class="img-fluid">
        <p><?php print $produit['nom']; ?></p>
            <h3><?php print $produit['prix']; ?><span> DT </span> </h3>
        <a href="produit.php?id=<?php print $produit['id']; ?>" class="btn btn-view">View</a>
      </div>
    </div>
        <?php
        }}
    ?>
  </div>
    
</div>
<?php
   include "inc/footer.php"
?> 
<?php
include "inc/functions.php";

$categories= getAllCategories($conn);

if(isset ($_GET['id'])){
   $produit= getProduitBYID($conn,$_GET['id']);
}
include "inc/header.php";

?>

      <div class="row col-12 mt-4">

      <div class="card col-8 offset-2" >
  <img src="images/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit['nom']   ?></h5>
    <p class="card-text"><?php echo $produit['description']   ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['prix'] ?>DT</li>
    
    
    <?php

       foreach($categories as $index => $c){

           if($c['id']== $produit['categorie']){

          print'<button class="btn btn-success mb-2">'. $c['nom'].'</button>';

           }



       }

?>
    
    </ul>
    
  </div>
    <div class="">
      <form action="actions/commander.php" method="POST">
        <input type="hidden" name="produit" value="<?php echo $produit['id'] ?>" >
        <input type="number" class="form-control col-2" name="qte" value="1">
        <button type="submit" class="btn btn-primary mt-2">Ajouter au panier</button>
      </form>

      </div>
       
<?php
   include "inc/footer.php"
?> 
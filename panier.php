<?php
session_start();
include "inc/functions.php";

$categories= getAllCategories($conn);

if(isset ($_GET['id'])){
   $produit= getProduitBYID($conn,$_GET['id']);
}

if(isset ($_SESSION['panier'])){
    if(count ($_SESSION['panier'][3]) > 0){
        $commandes = $_SESSION['panier'][3];
    }
}

include "inc/header.php";

?>
<div class="row col-12 mt-4">
    <h2>Panier utilisateur</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($commandes as $index => $comm){
                $produit = getProduitById($conn, $comm[0]);
                print'<tr>
                <td>
                <img src="images/'.$produit['image'].'" class="img-thumbnail" style="width: 100px;">
                '.$produit['nom'].'
                </td>
                <td>'.$produit['prix'].'</td>
                <td>'.$comm[1].'</td>
                <td>'.$comm[2].'</td>
                <td>
                <a href="actions/supprimer.php?id='.$produit['id'].'" class="btn btn-danger">Supprimer</a>
                </td>
                </tr>';
            }
            ?>

        </tbody>
    </table>
    <button class="btn btn-primary">Valider</button>

<?php
   include "inc/footer.php";
?> 
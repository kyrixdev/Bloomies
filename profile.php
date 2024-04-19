<?php
session_start();

if(!isset($_SESSION['nom'])){

    header('location:connexion.php');

}
include "inc/functions.php";
include "inc/header.php";


?>


<div class="container">

<div class="title">
<h1>Bienvenue <span class="text-primary"> <?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></span></h1>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="list-group profile-list">
            <?php 
            if(isset($_GET['id'])){
                if($_GET['id'] == 'profile'){
                    ?>
                    <a href="profile.php?id=profile" class="list-group-item list-group-item-action active">
                        <i data-lucide="user"></i>
                        Profile
                    </a>
                    <a href="profile.php?id=commandes" class="list-group-item list-group-item-action">
                        <i data-lucide="shopping-bag"></i>
                        Commandes
                    </a>
                    <a href="deconnexion.php" class="list-group-item list-group-item-action">
                        <i data-lucide="log-out"></i>
                        Deconnexion
                    </a>
                    <?php
                }elseif($_GET['id'] == 'commandes'){
                    ?>
                    <a href="profile.php?id=profile" class="list-group-item list-group-item-action">
                        <i data-lucide="user"></i>
                        Profile
                    </a>
                    <a href="profile.php?id=commandes" class="list-group-item list-group-item-action active">
                        <i data-lucide="shopping-bag"></i>
                        Commandes
                    </a>
                    <a href="deconnexion.php" class="list-group-item list-group-item-action">
                        <i data-lucide="log-out"></i>
                        Deconnexion
                    </a>
                    <?php
                }
            }else{
                ?>
                    <a href="profile.php?id=profile" class="list-group-item list-group-item-action active">
                        <i data-lucide="user"></i>
                        Profile
                    </a>
                    <a href="profile.php?id=commandes" class="list-group-item list-group-item-action">
                        <i data-lucide="shopping-bag"></i>
                        Commandes
                    </a>
                    <a href="deconnexion.php" class="list-group-item list-group-item-action">
                        <i data-lucide="log-out"></i>
                        Deconnexion
                    </a>
                <?php
            }
            ?>
        </div>
    </div>

<?php 
if(isset($_GET['id'])){
    if($_GET['id'] == 'profile'){
    ?>

    <div class="col-md-6">
        <h2>Profile</h2>
        <form action="actions/updateProfile.php" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $_SESSION['nom']; ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $_SESSION['prenom']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>

<?php
    }elseif($_GET['id'] == 'commandes'){
        $paniers = getPanierByUser($conn,$_SESSION['id']);
        if(count($paniers) > 0){
            ?>
                <div class="col-md-9">
                    <h2>Mes commandes</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Etat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($paniers as $panier){
                                ?>
                                <tr>
                                    <td><?php echo $panier['id']; ?></td>
                                    <td><?php echo $panier['date_creation']; ?></td>
                                    <td><?php echo $panier['total']; ?></td>
                                    <?php 
                                                    if ($panier['etat'] == "En cours") {
                                                        print '<td><span class="badge bg-warning" >En cours </span></td>';
                                                      } 
                                                      elseif ($panier['etat'] == "En livraison") {
                                                        print '<td><span class="badge bg-info text-white" >En livraison</span></td>';
                                                      }
                                                      elseif ($panier['etat'] == "livraison terminer") {
                                                        print '<td><span class="badge bg-success text-white" >livraison terminer</span></td>';
                                                      }
                                                      else {
                                                        print '<td><span class="badge bg-danger text-white" >Annulee</span></td>';
                                                      };
                                    ?>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#afficherModel<?php echo $panier['id']; ?>" class="btn btn-warning">Détails</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }else{
            ?>
                <div class="col-md-9">
                    <h2 class="text-center title">Pas de commandes</h2>
                    <a href="index.php" class="btn btn-shop d-flex justify-contetn-center">Retourner a la boutique</a>
                </div>
        </div>
            <?php
        }
    }
}else{
    ?>
    <div class="col-md-6">
        <h2>Profile</h2>
        <form action="actions/updateProfile.php" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $_SESSION['nom']; ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $_SESSION['prenom']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
<?php
}
    
?>

<!-- Modal -->
<?php 
$paniers = getPanierByUser($conn,$_SESSION['id']);
foreach($paniers as $panier){
    ?>
    <div class="modal fade" id="afficherModel<?php echo $panier['id']; ?>" tabindex="-1" aria-labelledby="afficherModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="afficherModelLabel">Details de la commande</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $commandes = getCommandePerPanier($conn,$panier['id']);
                foreach($commandes as $comm){
                    $produit = getProduitById($conn,$comm['produit']);
                    ?>
                    <tr>
                        <td>
                            <img src="images/<?php echo $produit['image']; ?>" class="img-thumbnail" style="width: 50px;">
                            <?php echo $produit['nom']; ?>
                        </td>
                        <td><?php echo $produit['prix']; ?></td>
                        <td><?php echo $comm['quantite']; ?></td>
                        <td><?php echo $comm['total']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
    </div>
    <?php
}
?>
</div>
<?php
   include "inc/footer.php"
?>

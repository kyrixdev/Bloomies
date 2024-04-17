<?php

session_start();

//1_recuperation de données du formulaire


$id= $_POST['idstock'];
$quantite = $_POST['quantite'];


// 2_la chaine de connexion 
function connectM();
    // 3_la creation de la requette
$requete = "UPDATE stocks SET quantite='$quantite'  WHERE id='$id'  ";

// 4_execution de la requette 

$resultat = $conn->query($requete);

if ($resultat) {
    header('location:liste.php?modif=ok');
}

?>

<?php

session_start();

//1_recuperation de données du formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("Y-m-d"); //"2024-04-01"

// 2_la chaine de connexion 
function connect(){

    // Définir les informations de connexion à la base de données
    define("MONHOST","localhost");
    define("MONUSER","root");
    define("MONPWD","");
    define("MABD","fleur");

    try {
        // Créer l'objet PDO pour la connexion à la base de données en utilisant les constantes définies
        $conn = new PDO("mysql:host=" . MONHOST . ";dbname=" . MABD, MONUSER, MONPWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Retourner la connexion
        return $conn;
    } catch (PDOException $e) {
        // En cas d'erreur lors de la connexion, afficher l'erreur
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        // Arrêter l'exécution du script en cas d'échec de la connexion
        die();
    }
}

// Appel de la fonction connect() pour obtenir la connexion à la base de données
$conn = connect();

// 3_la creation de la requette
$requete = "INSERT INTO categories(nom, description, createur, date_creation) VALUES ('$nom', '$description', '$createur', '$date_creation')";

// 4_execution de la requette 

$resultat = $conn->query($requete);

if ($resultat) {
    header('location:liste.php?ajout=ok');
}

?>

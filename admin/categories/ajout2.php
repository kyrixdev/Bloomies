<?php
session_start();

$nom = $_POST['nom'];
$description = $_POST['description'];
$quantite =$_POST['quantite'];
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
}

$createur = $_SESSION['id'];
$date_creation = date("Y-m-d");

function connect(){
    define("MONHOST","localhost");
    define("MONUSER","root");
    define("MONPWD","");
    define("MABD","fleur");

    try {
        $conn = new PDO("mysql:host=" . MONHOST . ";dbname=" . MABD, MONUSER, MONPWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        die();
    }
}

$conn = connect();

$requete = $conn->prepare("INSERT INTO categories(nom, description, image, createur, date_creation) VALUES (:nom, :description, :image, :createur, :date_creation)");

$requete->bindParam(':nom', $nom);
$requete->bindParam(':description', $description);
$requete->bindParam(':image', $image);
$requete->bindParam(':createur', $createur);
$requete->bindParam(':date_creation', $date_creation);

$resultat = $requete->execute();
if ($resultat) {

$produit_id=$conn->lastinsertid()

$requete2 = "INSERT INTO stocks(produit,quanite,createur,date_creation) VALUES('$produit_id', '$quantite','$createur','$date_creation')"; 

if($conn->query($requete2)){
 header('location:liste.php?ajout=ok');
}else{
    echo"impossible d'ajouter le stock du produit";
    
}
?>

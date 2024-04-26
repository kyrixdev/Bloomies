
<?php
session_start();
if(isset($_SESSION['nom'])){

  header('location:profile.php');

}






include "inc/functions.php";
$user=true;

$categories=getAllCategories($conn);

if (!empty($_POST)) {
  $user = ConnectVisiteur($conn, $_POST);
  if ($user !== false) {
      session_start();
      $_SESSION['id']= $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['nom'] = $user['nom'];
      $_SESSION['prenom'] = $user['prenom'];
      $_SESSION['mp'] = $user['mp'];
      $_SESSION['telephone'] = $user['telephone'];
      $_SESSION['admin'] = 0;
      header('location:profile.php');
  }}

include "inc/header.php";

 ?>

      <!--fin nav-->
<div class="col-5 mx-auto p-5">
      <form action="connexion.php" method="post" onsubmit="return validateLoginForm()">
        <h1 class="text-center">Connexion</h1>
        <div class="alert alert-danger" role="alert" id="alert" style="display: none">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mot de passe </label>
          <input type="password" name="mp" class="form-control" id="password">
        </div>
        
        <button type="submit" class="btn btn-login w-100 text-center">connecter</button>
        <a href="registre.php" class="btn-register-go">Créer un compte</a>
      </form>

    </div>

       <!--footer-->
       <?php
   
   include "inc/footer.php"
    

    ?>

<?php
if(!$user){
  print "<script>
  Swal.fire({
    title: 'Erreur',
    text: 'Cordonnes non valide ',
    icon: 'Ereur',
    confirmButtonText: 'OK',
    timer:2000
  })
  
  </script>";
  
}

?>
</html>
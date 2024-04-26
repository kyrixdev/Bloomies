<?php

session_start();
if(isset($_SESSION['nom'])){

  header('location:profile.php');

}




include "inc/functions.php";

$showRegistrationAlert=0;

$categories=getAllCategories($conn);

if(!empty($_POST)){
  
  if(AddVisiteur($conn,$_POST)){
    $showRegistrationAlert=1;

  }
}

include "inc/header.php";

 ?>

      <!--fin nav-->
<div class="col-5 mx-auto p-5">
    <h1 class="text-center">Registre</h1>
    <div class="alert alert-danger" role="alert" id="alert" style="display: none">
        </div>
    <form action="registre.php" method="post"  onsubmit="return validateRegisterForm()">
        <div class="mb-3">
            <label for="nom" class="form-label"> Nom </label>
            <input type="text" name="nom"  class="form-control" id="nom">
          </div>
          <div class="mb-3">
            <label for="prenom" class="form-label"> Prenom </label>
            <input type="text"  name="prenom"  class="form-control" id="prenom">
          </div>
          <div class="mb-3">
            <label for="telephone" class="form-label">Telephone </label>
            <input type="text" name="telephone"  class="form-control" id="telephone">
          </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email">
          
        </div>
        <div class="mb-3">
          <label for="mp" class="form-label">Mot de passe </label>
          <input type="password" name="mp"  class="form-control" id="password">
        </div>
        
        <button type="submit" class="btn btn-login w-100">Envoyer</button>
        <a href="connexion.php" class="btn-register-go">Se connecter</a>
      </form>

    </div>

       <!--footer-->
       <?php
   
   include "inc/footer.php"
    

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.all.min.js"></script>

<?php
if($showRegistrationAlert==1){
  print "<script>
  Swal.fire({
    title: 'Success',
    text: 'Creation de compte avec success',
    icon: 'Success',
    confirmButtonText: 'OK',
    timer:2000
  })
  
  </script>";
  
}

?>

</html>
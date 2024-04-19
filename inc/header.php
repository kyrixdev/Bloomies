<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bloomie's Flower Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/bloomies/css/dashboard.css">
  <link rel="icon" href="/bloomies/images/icon.png" sizes="32x32" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <!-- Development version -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

  <!-- Production version -->
  <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>
<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./images/logo-v.png" alt="Bloomie's Flower Shop" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <?php
            foreach ($categories as $categorie) {
              print '<li class="nav-item"><a class="nav-link" href="categorie.php?id='.$categorie['id'].'">' . $categorie['nom'] . '</a></li>';
            }
            ?>



          </li>
        </ul>
        <form class="search-bar" action="search.php" method="POST">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success seach-btn" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
        <div class="search-icon nav-link">
          <i data-lucide="search" stroke-width="1"></i>
        </div>
        <?php if (isset($_SESSION['nom'])) {
          
          print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php">profile</a>
          </li>';
                  } else {

                    print '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="connexion.php"><i data-lucide="user" stroke-Width="1"></i></a>
          </li>';
                  }

        ?>

        <?php
        if (isset($_SESSION['nom'])) {
          print '<a href="deconnexion.php " class="btn btn-primary">deconnexion</a>';
        }
        ?>
        <li class="nav-item position-relative">
          <a class="nav-link " aria-current="page" href="panier.php"><i data-lucide="shopping-bag" stroke-width="1"></i></a>
          <span class="badge bg-greeny position-absolute"><?php if (isset($_SESSION['panier'])) {
                                        print count($_SESSION['panier'][3]);
                                      } else {
                                        print 0;
                                      } ?></span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
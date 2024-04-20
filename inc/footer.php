<div class="text-center p-5 mt-4 footer" >
    <div class="row">
        <div class="col-3">
            <img src="images/logo.png" alt="logo" class="img-fluid w-50">
        </div>
        <div class="col-3">
            <h4 class="footer-item">Navigation</h4>
            <ul>
                <li class="footer-link"><a href="index.php">Accueil</a></li>
                <li class="footer-link"><a href="produits.php">Produits</a></li>
                <li class="footer-link"><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="col-3">
            <h4 class="footer-item">Categories</h4>
            <ul>
                <?php
                $categories = getAllCategories($conn);
                foreach ($categories as $categorie) {
                    print '<li class="footer-link"><a href="categorie.php?id=' . $categorie['id'] . '">' . $categorie['nom'] . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="col-3">
            <h4 class="footer-item">Reseaux sociaux</h4>
            <ul>
                <li class="footer-link"><a href="#">Facebook</a></li>
                <li class="footer-link"><a href="#">Instagram</a></li>
                <li class="footer-link"><a href="#">Twitter</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="footer-text">Bloomie's Flower Shop &copy; 2024</p>
        </div>
</div>



</body>
<script src="js/main.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
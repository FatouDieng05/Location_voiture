<?php
require_once 'config.php';

$sql = "SELECT * FROM voitures WHERE statut = 'disponible'";
$stmt = $db->query($sql);
$voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil LOCATION</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="script/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="social-bar">
            <!-- Icônes à gauche (réseaux sociaux) -->
            <div class="social-icons-left">
                <a href="https://www.facebook.com" target="_blank">
                    <img src="images/facebook.png" alt="Facebook" class="social-icon">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="images/insta.png" alt="Instagram" class="social-icon">
                </a>
                <a href="https://wa.me" target="_blank">
                    <img src="images/wtsp.png" alt="WhatsApp" class="social-icon">
                </a>
            </div>
        
            <!-- Logo centré -->
            <div class="logo-container">
                <img src="images/voitures/logo.PNG" alt="Logo Boutique" class="logo">
            </div>
        
            <!-- Icônes à droite (recherche et panier) -->
            <div class="search-cart-icons">
                <a href="javascript:void(0);" class="search-icon" id="search-icon">
                    <img src="images/search.png" alt="Search" class="icon">
                </a>
            </div>
        </div>
       
        <h1 class="title">FASHA'S LOCATION</h1>
       
    <div class="top">
    <ul>
        <li>
            <img src="images/home.png" alt="Home Icon" class="icon">
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <img src="images/shop.png" alt="Library Icon" class="icon">
            <a href="voitures.php">Nos voitures</a>
        </li>

        <li>
            <img src="images/infos.png" alt="Library Icon" class="icon">
            <a href="contacts.php">Nous contacter</a>
        </li>
    </ul>
    </div>
    
        <div class="products-container-2">
            <?php foreach ($voitures as $voiture) : ?>
            <div class="product-box-2">
                <img src="<?= $voiture['image'] ?>" alt="<?= $voiture['marque'] ?> <?= $voiture['modele'] ?>">
                <h3><?= $voiture['marque'] ?> <?= $voiture['modele'] ?></h3>
                <button class="buy-button-2" onclick="window.location.href='louer.php?id_voiture=<?= $voiture['id_voiture'] ?>'">Louer</button>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    
<div class="bottom">
    <ul>
        <li>
            <img src="images/wtsp.png" alt="GitHub Icon" class="icon">
            <a href="https://github.com/agentLakh">WhatsApp</a>
        </li>
        <li>
            <img src="images/facebook.png" alt="GitHub Icon" class="icon">
            <a href="https://www.facebook.com" target="_blank">Facebook</a>
        </li>
        <li>
            <img src="images/insta.png" alt="GitHub Icon" class="icon">
            <a href="https://github.com/FatouDieng05">Instagram</a>
        </li>
    </ul>
</div>

    </div>
</body>
</html>

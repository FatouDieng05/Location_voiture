<?php
require 'config.php'; // Connexion à la base


$id_voiture = $_GET['id_voiture']; // Récupération de l'ID de la voiture

$sql = "SELECT * FROM voitures WHERE id_voiture = :id_voiture";
$stmt = $db->prepare($sql); 
$stmt->bindParam(':id_voiture', $id_voiture, PDO::PARAM_INT);
$stmt->execute();
$voiture = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$voiture) {
    echo "Voiture introuvable.";
    exit();
}
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
        
        <!-- Interface de location -->
        <div class="location-interface">
            <!-- Photo du produit à gauche -->
            <div class="product-image">
                <img src="<?= $voiture['image'] ?>" alt="<?= $voiture['marque'] ?> <?= $voiture['modele'] ?>">
                <center>
                    <h3>Description :</h3>
                </center>
                    <br>
                    Modèle : <?= $voiture['modele'] ?>
                    <br>
                    Année de fabrication : <?= $voiture['annee'] ?>
                    <br>
                    Plaque d'immatriculation : <?= $voiture['plaque_immatriculation'] ?>
                    <br>
                    Prix : À partir de <?= $voiture['prix'] ?> € 
        
            </div>

            <!-- Détails à droite -->
            <div class="product-details">
                <!-- Titre -->
                <h2><?= $voiture['marque'] ?></h2>

            <form action="reserver.php" method="POST">
                <input type="hidden" name="id_voiture" value="<?= $voiture['id_voiture'] ?>">
                <!-- Sélection des dates -->
                <div class="date-selection">
                    <label for="start-date">Date de début :</label>
                    <input type="date" id="date_debut" name="date_debut" oninput="calculatePrice()">

                    <label for="end-date">Date de fin :</label>
                    <input type="date" id="date_fin" name="date_fin" oninput="calculatePrice()">
                </div>

                <!-- Prix calculé -->
                
                <input type="hidden" name="montant" id="montant">
                    <div class="price-display">
                        <p>Prix total : <span id="total-price">0</span> €</p>
                    </div>


               

                <!-- Moyen de paiement -->
                <div class="payment-method">
                    <h3>Moyen de paiement :</h3>
                    <select id="moyen_paiement" name="moyen_paiement">
                        <option value="cash">Espèces</option>
                        <option value="carte">Carte</option>
                        <option value="cheque">Cheque</option>
                    </select>
                </div>

                <!-- Bouton de location -->
                <button type="submit" class="buy-button">Confirmer la location</button>
            </form>
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

    <!-- Script JavaScript -->
    <script src="script/script.js"></script>

</body>
</html>
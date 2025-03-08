<?php
require 'config.php';

$sql = "SELECT * FROM voitures";
$stmt = $db->query($sql);
$voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Voitures</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="script/script.js" defer></script>
</head>
<body>
    <div class="container">
        <!-- Barre des réseaux sociaux et logo -->
        <div class="social-bar">
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
            <div class="logo-container">
                <img src="images/voitures/logo.PNG" alt="Logo Boutique" class="logo">
            </div>
            <div class="search-cart-icons">
                <a href="javascript:void(0);" class="search-icon" id="search-icon">
                    <img src="images/search.png" alt="Search" class="icon">
                </a>
            </div>
        </div>

        <!-- Titre de la page -->
        <h1 class="title">FASHA'S LOCATION - Gestion des Voitures</h1>

        <!-- Barre de navigation -->
        <div class="top">
            <ul>
                <li>
                    <img src="images/home.png" alt="Home Icon" class="icon">
                    <a href="gestion_voitures.php">Ajouter une nouvelle voiture</a>
                </li>
            </ul>
        </div>

        <!-- Section des voitures -->
        <div class="voitures-container">
        <?php foreach ($voitures as $voiture) : ?>
            <!-- Exemple de boîte de voiture -->
            <div class="voiture-box">
                <!-- Icône de statut -->
                <div class="statut-icone statut-disponible"></div>
                <img src="<?= $voiture['image'] ?>" alt="<?= $voiture['marque'] ?> <?= $voiture['modele'] ?>" class="voiture-image">
                <h3><?= $voiture['marque'] ?> <?= $voiture['modele'] ?></h3>
                <button class="voir-details">Voir détails</button>
                <div class="details-voiture">
                    <p>Marque: <?= $voiture['marque'] ?></p>
                    <p>Modèle: <?= $voiture['modele'] ?></p>
                    <p>Année: <?= $voiture['annee'] ?></p>
                    <p>Plaque: <?= $voiture['plaque_immatriculation'] ?></p>
                    <p>Prix: <?= $voiture['prix'] ?></p>
                    <p>Disponibilité: <span class="disponibilite-text"><?= $voiture['statut'] ?></span></p>
                </div>
                <div class="actions-voiture">
                    <form action="supprimer_voiture.php" method="POST" onclick='return confirm(\"Voulez-vous vraiment supprimer cette voiture ?\");'>
                        <input type="hidden" name="id_voiture" value="<?php echo $voiture['id_voiture']; ?>">
                        <button type="submit" class="supprimer">Supprimer</button>
                    </form>
                    <button class="modifier">
                        <a href="gestion_voitures.php?id_voiture=<?= $voiture['id_voiture']; ?>">Modifier</a>
                    </button>
                </div>
            </div>

        <?php endforeach; ?>

            <!-- Ajoutez autant de boîtes de voiture que nécessaire -->
        </div>

        <!-- Barre inférieure -->
        <div class="bottom">
            <ul>
                <li>
                    <img src="images/wtsp.png" alt="WhatsApp Icon" class="icon">
                    <a href="https://github.com/agentLakh">WhatsApp</a>
                </li>
                <li>
                    <img src="images/facebook.png" alt="Facebook Icon" class="icon">
                    <a href="https://www.facebook.com" target="_blank">Facebook</a>
                </li>
                <li>
                    <img src="images/insta.png" alt="Instagram Icon" class="icon">
                    <a href="https://github.com/FatouDieng05">Instagram</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>

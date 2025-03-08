<?php
require 'config.php'; // Connexion à la base

$sql = "SELECT r.*, c.nom, c.prenom, v.marque, v.modele
        FROM reservations r
        JOIN clients c ON r.id_client = c.id_client
        JOIN voitures v ON r.id_voiture = v.id_voiture
        WHERE r.statut = 'en attente'";
$stmt = $db->query($sql);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Administrateur</title>
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
       
        <h1 class="title">FASHA'S LOCATION - Interface Administrateur</h1>
       
        <div class="top">
            <ul>
                <li>
                    <img src="images/home.png" alt="Home Icon" class="icon">
                    <a href="admin.php">Administrateur</a>
                </li>
               
            </ul>
        </div>
        
        
      <!-- Section du tableau de gestion -->
        <div class="table-container">
            <table class="gestion-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Voiture</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                        <td><?= $reservation['nom'] ?> <?= $reservation['prenom'] ?></td>
                        <td><?= $reservation['marque'] ?> <?= $reservation['modele'] ?></td>
                        <td><?= $reservation['date_debut'] ?></td>
                        <td><?= $reservation['date_fin'] ?></td>
                        <td><?= $reservation['statut'] ?></td>
                        <td>
                            <a href="valider_reservation.php?id_reservation=<?= $reservation['id_reservation'] ?>">Valider</a>
                            <a href="annuler_reservation.php?id_reservation=<?= $reservation['id_reservation'] ?>">Annuler</a>
                        </td>
                    <tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
</body>
</html>
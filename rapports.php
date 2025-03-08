<?php
require 'config.php'; // Connexion à la base


// Statistiques sur les clients
$sql_clients = "SELECT COUNT(*) AS total_clients FROM clients";
$stmt_clients = $db->prepare($sql_clients);
$stmt_clients->execute();
$clients = $stmt_clients->fetch(PDO::FETCH_ASSOC);

// Statistiques sur les réservations
$sql_reservations = "SELECT COUNT(*) AS total_reservations FROM reservations";
$stmt_reservations = $db->prepare($sql_reservations);
$stmt_reservations->execute();
$reservations = $stmt_reservations->fetch(PDO::FETCH_ASSOC);

// Statistiques sur les paiements
$sql_revenu = "SELECT SUM(montant) AS total_revenu FROM paiements";
$stmt_revenu = $db->prepare($sql_revenu);
$stmt_revenu->execute();
$revenu = $stmt_revenu->fetch(PDO::FETCH_ASSOC);

// Statistiques sur les voitures
$sql_voitures = "SELECT 
    COUNT(*) AS total_voitures, 
    SUM(CASE WHEN statut = 'disponible' THEN 1 ELSE 0 END) AS voitures_disponibles, 
    SUM(CASE WHEN statut = 'louee' THEN 1 ELSE 0 END) AS voitures_louees 
    FROM voitures";
$stmt_voitures = $db->prepare($sql_voitures);
$stmt_voitures->execute();
$voitures = $stmt_voitures->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Administrateur - Génération de Rapports</title>
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
        
        <!-- Section de génération de rapports -->
        <div class="report-section">
            <h2>Rapport de Location de Voitures</h2>
            <div class="report-options">
                <div class="report-option">
                    <h2>Voitures</h2>
                    <h3>Total des voitures : <?= $voitures['total_voitures'] ?> </h3>
                    <h3>Voitures disponibles : <?= $voitures['voitures_disponibles'] ?></h3>
                    <h3>Voitures louées : <?= $voitures['voitures_louees'] ?> </h3>
                    
                </div>
                <div class="report-option">
                    <h2>Clients</h2>
                    <h3>Total des clients : <?= $clients['total_clients'] ?></h3>
                </div>
                <div class="report-option">
                    <h2>Réservations</h3>
                    <h3>Total des réservations : <?= $reservations['total_reservations'] ?></h3>
                    <h3>Revenu total généré : <?= $revenu['total_revenu'] ?></h3>                    
                </div>
            </div>
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
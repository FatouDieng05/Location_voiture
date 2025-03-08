<?php
require 'config.php';
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirige vers la page de connexion
    header("Location: login.php");
    exit();
}
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
        
        <!-- Section des boutons de gestion -->
        <div class="admin-buttons">
            <div class="admin-button">
                <a href="gestion_voitures.php">
                    <img src="images/car.png" alt="Gestion Voitures" class="icon">
                    <span>Gestion des Voitures</span>
                </a>
            </div>
            <div class="admin-button">
                <a href="gestion_clients.php">
                    <img src="images/client.png" alt="Gestion Clients" class="icon">
                    <span>Gestion des Clients</span>
                </a>
            </div>

            <div class="admin-button">
                <a href="rapports.php">
                    <img src="images/rapports.png" alt="Rapports" class="icon">
                    <span>Rapports</span>
                </a>
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
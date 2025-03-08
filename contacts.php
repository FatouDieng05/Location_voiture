<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous Contacter - FASHA'S LOCATION</title>
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
       
        <h1 class="title">FASHA'S LOCATION - Nous Contacter</h1>
       
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
        
        <!-- Section de contact -->
        <div class="contact-section">
            <h2>Contactez-nous</h2>
            <div class="contact-info">
                <div class="info-item">
                    <img src="images/location.png" alt="Location Icon" class="info-icon">
                    <p><strong>Adresse :</strong> 123 Rue de la Location, Dakar, Sénégal</p>
                </div>
                <div class="info-item">
                    <img src="images/phone.png" alt="Phone Icon" class="info-icon">
                    <p><strong>Téléphone :</strong> +221 33 123 45 67</p>
                </div>
                <div class="info-item">
                    <img src="images/email.png" alt="Email Icon" class="info-icon">
                    <p><strong>Email :</strong> contact@fashalocation.com</p>
                </div>
            </div>
            
            <!-- Formulaire de contact -->
            <form class="contact-form">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet :</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Envoyer</button>
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
</body>
</html>
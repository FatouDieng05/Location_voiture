<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
    $date_naissance = $_POST["date_naissance"];
    $adresse = $_POST["adresse"];
    $numero_permis = $_POST["numero_permis"];

    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $sql = "INSERT INTO clients (nom, prenom, email, mot_de_passe, date_naissance, adresse, numero_permis) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $query = $db->prepare($sql);


    if ($query->execute([$nom, $prenom, $email, $mot_de_passe, $date_naissance, $adresse, $numero_permis])) {
        session_start();
        $_SESSION["id_client"] = $db->lastInsertId(); 
        header("Location: index.php"); 
        exit();
    } else {
        header("Location: inscription.php?erreur=Erreur lors de l'inscription");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>
<?php if (isset($_GET["erreur"])): ?>
        <p style="color: red;"><?= htmlspecialchars($_GET["erreur"]) ?></p>
    <?php endif; ?>

    <div class="logo-container">
        <img src="images/voitures/logo.PNG" alt="Logo Boutique" class="logo">
    </div>
    <h1 class="title">FASHA'S LOCATION</h1>
    <div class="signup-container">
        <div class="signup-form">
            <h2>Inscription</h2>
            <form action="" method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <input type="date" name="date_naissance" required>
                <input type="text" name="adresse" placeholder="Adresse" required>
                <input type="text" name="numero_permis" placeholder="Numéro de permis" required>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Déjà un compte ? <a href="login.php">Se connecter</a></p>
        </div>
    </div>
</body>
</html>

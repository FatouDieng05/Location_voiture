<?php
session_start();
require_once 'config.php'; 
$erreur = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //email : admin@gmail.com    mot de passe : admin1234@
    if ($email === 'admin@gmail.com' && $password === 'admin1234@') {
        $_SESSION['user_id'] = 1;
        $_SESSION['role'] = 'admin';
        header('Location: admin.php');
        exit();
    }

    $sql = "SELECT id_client, mot_de_passe FROM clients WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        $erreur = "Email introuvable";
    } elseif (!password_verify($password, $user["mot_de_passe"])) {
        $erreur = "Mot de passe incorrect";
    } else {
        $_SESSION["id_client"] = $user["id_client"];
        header("Location: index.php"); 
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php if ($erreur): ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php endif; ?>

    <div class="logo-container">
        <img src="images/voitures/logo.PNG" alt="Logo Boutique" class="logo">
    </div>
    <h1 class="title">FASHA'S LOCATION</h1>
    <div class="login-container">
        <div class="login-form">
            <h2>Connexion</h2>
            <form method="POST" action="">
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
            <p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
        </div>
    </div>
</body>
</html>
<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee_fabrication = $_POST['annee_fabrication'];
    $plaque_immatriculation = $_POST['plaque_immatriculation'];
    $prix = $_POST['prix'];
    $statut = $_POST['statut'];

    // Gestion du téléversement de la photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; // Dossier où les images seront stockées
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Crée le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES['photo']['name']);
        $uploadFilePath = $uploadDir . $fileName;

        // Déplacer le fichier téléversé vers le dossier de destination
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFilePath)) {
            // Insertion des données dans la base de données
            $sql = "INSERT INTO voitures (marque, modele, annee, plaque_immatriculation, prix, statut, image)
                    VALUES (:marque, :modele, :annee_fabrication, :plaque_immatriculation, :prix, :statut, :image)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':marque' => $marque,
                ':modele' => $modele,
                ':annee_fabrication' => $annee_fabrication,
                ':plaque_immatriculation' => $plaque_immatriculation,
                ':prix' => $prix,
                ':statut' => $statut,
                ':image' => $uploadFilePath
            ]);

            header('Location: admin_voitures.php');
            exit();

        } else {
            echo "Erreur lors du téléversement de la photo.";
        }
    } else {
        echo "Veuillez sélectionner une photo valide.";
    }
}
?>

<?php
require 'config.php';

if(isset($_GET['id_voiture'])) {
    $id_voiture = $_GET['id_voiture'];
    $sql = "SELECT * FROM voitures WHERE id_voiture = :id_voiture";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_voiture', $id_voiture, PDO::PARAM_INT);
    $stmt->execute();
    $voiture = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Voitures</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Gestion des Voitures</h1>
        
        <div class="top">
            <ul>
                <li>
                    <img src="images/home.png" alt="Home Icon" class="icon">
                    <a href="admin.php">Administrateur</a>
                </li>
               
            </ul>
        </div>
        <!-- Formulaire d'ajout d'une nouvelle voiture -->
        <form action="" method="POST" enctype="multipart/form-data" class="voiture-form">

            <div class="form-group">
                <label for="marque">Marque :</label>
                <input type="text" id="marque" name="marque" required>
            </div>

            <div class="form-group">
                <label for="modele">Modèle :</label>
                <input type="text" id="modele" name="modele" required>
            </div>

            <div class="form-group">
                <label for="annee">Année de fabrication :</label>
                <input type="number" id="annee_fabrication" name="annee_fabrication" min="1900" max="2023" required>
            </div>

            <div class="form-group">
                <label for="plaque">Plaque d'immatriculation :</label>
                <input type="text" id="plaque_immatriculation" name="plaque_immatriculation" required>
            </div>

            <div class="form-group">
                <label for="plaque">Prix :</label>
                <input type="number" id="prix" name="prix" required>
            </div>

            <div class="form-group">
                <label for="statut">Statut :</label>
                <select id="statut" name="statut" required>
                    <option value="disponible">Disponible</option>
                    <option value="louee">Louée</option>
                    <option value="maintenance">En maintenance</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Photo de la voiture :</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-button">Enregistrer la voiture</button>
            </div>
        </form>
    </div>
</body>
</html>

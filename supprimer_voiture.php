<?php
require 'config.php'; // Connexion à la base

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_voiture = $_POST['id_voiture']; // Sécurisation de l'ID

    
        $sql = "DELETE FROM voitures WHERE id_voiture = :id_voiture";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_voiture', $id_voiture, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("Location: admin_voitures.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de la voiture.";
        }
}
?>
<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_voiture = $_POST['id_voiture'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $plaque_immatriculation = $_POST['plaque_immatriculation'];
    $prix = $_POST['prix'];

    $sql = "UPDATE voitures SET marque = :marque, modele = :modele, annee = :annee, plaque_immatriculation = :plaque_immatriculation, statut = :statut, image = :image, prix = :prix WHERE id_voiture = :id_voiture";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_voiture', $id_voiture, PDO::PARAM_INT);
    $stmt->bindParam(':marque', $marque);
    $stmt->bindParam(':modele', $modele);
    $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);
    $stmt->bindParam(':plaque_immatriculation', $plaque_immatriculation);
    $stmt->bindParam(':statut', $statut);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':prix', $prix);

    if ($stmt->execute()) {
        // Redirection vers la page admin_voitures.php après modification
        header("Location: admin_voitures.php");
        exit();
    } else {
        echo "Erreur lors de la modification.";
    }
}
?>
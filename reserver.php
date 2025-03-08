<?php
session_start();
require 'config.php'; // Connexion à la base

if (!isset($_SESSION['id_client'])) {
    header("Location: login.php");
    exit();
}

// Récupérer l'ID du client à partir de la session
$id_client = $_SESSION['id_client'];

// Récupérer les autres informations nécessaires
$id_voiture = $_POST['id_voiture'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$montant = $_POST['montant'];
$mode_paiement = $_POST['moyen_paiement'];

// Insérer la réservation dans la base
$sql = "INSERT INTO reservations (id_client, id_voiture, date_debut, date_fin, statut) 
        VALUES (:id_client, :id_voiture, :date_debut, :date_fin, 'en attente')";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
$stmt->bindParam(':id_voiture', $id_voiture, PDO::PARAM_INT);
$stmt->bindParam(':date_debut', $date_debut);
$stmt->bindParam(':date_fin', $date_fin);


if ($stmt->execute()) {
    $id_reservation = $db->lastInsertId();
    $sql_paiement = "INSERT INTO paiements (id_reservation, montant, date_paiement, mode_paiement) 
            VALUES (:id_reservation, :montant, :date_paiement, :mode_paiement)";
    $stmt_paiement = $db->prepare($sql_paiement);
    $stmt_paiement->bindParam(':id_reservation', $id_reservation, PDO::PARAM_INT);
    $stmt_paiement->bindParam(':montant', $montant, PDO::PARAM_STR);
    $stmt_paiement->bindParam(':date_paiement', $date_debut);
    $stmt_paiement->bindParam(':mode_paiement', $mode_paiement);
    
    if ($stmt_paiement->execute()) {
        echo "Réservation et paiement effectués avec succès.";
         header("Location: voitures.php");
         exit();
    } else {
        echo "Erreur lors du paiement.";
    }
} else {
    echo "Erreur lors de la réservation.";
}
?>
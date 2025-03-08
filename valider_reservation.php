<?php
require 'config.php';

$id_reservation = $_GET['id_reservation'];

$sql = "UPDATE reservations SET statut = 'confirmée' WHERE id_reservation = :id_reservation";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id_reservation', $id_reservation);

if ($stmt->execute()) {
    echo "Réservation confirmée.";
    header("Location: gestion_clients.php");
    exit();
} else {
    echo "Erreur lors de la confirmation.";
}
?>
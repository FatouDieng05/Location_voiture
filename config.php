<?php
$host = 'mysql-fatou2005.alwaysdata.net';
$dbname = 'fatou2005_php';
$username = 'fatou2005';
$password = 'babyfasha';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        )
    );
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
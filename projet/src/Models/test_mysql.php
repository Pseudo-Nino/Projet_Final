<?php 
// Définir les informations de connexion 
$host = 'localhost'; // hôte de la base de données 
$dbname = 'projetweb'; // nom de la base de données 
$username = 'nino'; // votre nom d'utilisateur MySQL 
$password = 'Pereira0301@'; // votre mot de passe MySQL 

try { 
    // Création de la connexion PDO 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); 
    // Définir le mode d'erreur de PDO à Exception 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // Message si la connexion est réussie 
    echo "Connexion réussie à la base de données."; 
    } catch (PDOException $e) { 
    // Message en cas d'erreur 
    echo "Échec de la connexion : " . $e->getMessage(); 
    } 
    ?>

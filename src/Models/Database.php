<?php
namespace App\Models;

use PDO;
use PDOException;

class Database {
    private static $connection;

    public static function getConnection() {
        if (!self::$connection) {
            try {
                $host = 'localhost'; // hôte de la base de données
                $dbname = 'projetweb'; // nom de la base de données
                $username = 'nino'; // votre nom d'utilisateur MySQL
                $password = 'Pereira0301@'; // votre mot de passe MySQL

                self::$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}

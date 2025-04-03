<?php

namespace App\Models;

use PDO;

class UtilisateurModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getUtilisateurByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE Email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ajouterUtilisateur($email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO Utilisateur (Email, Mot_De_Passe) VALUES (?, ?)");
        if ($stmt->execute([$email, $password])) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }
}

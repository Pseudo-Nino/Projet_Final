<?php

namespace App\Models;

use PDO;

class EtudiantModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function ajouterEtudiant($idUtilisateur, $nom, $prenom, $email, $password, $etablissement, $promotion) {
        $stmt = $this->pdo->prepare("INSERT INTO Etudiant (Id_Utilisateur, Nom, Prenom, Email, Mot_De_Passe, Id_Scolaire) VALUES (?, ?, ?, ?, ?, (SELECT Id_Scolaire FROM Scolaire WHERE Ville = ? AND Promotion = ?))");
        return $stmt->execute([$idUtilisateur, $nom, $prenom, $email, $password, $etablissement, $promotion]);
    }
}

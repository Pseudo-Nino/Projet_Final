<?php

namespace App\Models;

use PDO;

class PiloteModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function ajouterPilote($idUtilisateur, $nom, $prenom, $poste, $etablissement) {
        $stmt = $this->pdo->prepare("INSERT INTO Pilote (Id_Pilote, Id_Utilisateur, Poste, Nom, Prenom, Id_Scolaire) VALUES (?, ?, ?, ?, ?, (SELECT Id_Scolaire FROM Scolaire WHERE Ville = ?))");
        return $stmt->execute([$idUtilisateur, $idUtilisateur, $poste, $nom, $prenom, $etablissement]);
    }
}

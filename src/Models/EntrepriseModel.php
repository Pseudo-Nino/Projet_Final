<?php

namespace App\Models;

use PDO;

class EntrepriseModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function ajouterEntreprise($idUtilisateur, $nomEntreprise, $domaineActivite, $ville) {
        $stmt = $this->pdo->prepare("INSERT INTO Entreprise (Id_Utilisateur, Nom_Entreprise, Domaine_Activite, Ville) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$idUtilisateur, $nomEntreprise, $domaineActivite, $ville]);
    }
}

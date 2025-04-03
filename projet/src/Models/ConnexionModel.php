<?php
namespace App\Models;

use App\Models\Database;
use PDO;

class ConnexionModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getUtilisateurByEmail($email) {
        $query = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE Email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function ajouterUtilisateur($email, $motDePasse) {
        $query = $this->pdo->prepare("INSERT INTO Utilisateur (Email, Mot_De_Passe) VALUES (:email, :motDePasse)");
        return $query->execute(['email' => $email, 'motDePasse' => password_hash($motDePasse, PASSWORD_DEFAULT)]);
    }
}

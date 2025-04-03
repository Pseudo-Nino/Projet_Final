<?php
namespace App\Models;

use PDO;
use PDOException;

class OffreDeStage {
    private $pdo;

    public function __construct() {
        // Définir les informations de connexion 
        $host = 'localhost'; // hôte de la base de données 
        $dbname = 'projetweb'; // nom de la base de données 
        $username = 'nino'; // votre nom d'utilisateur MySQL 
        $password = 'Pereira0301@'; // votre mot de passe MySQL    

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getAllOffres() {
        $sql = "SELECT os.Id_Offre_De_Stage, os.Titre, os.Description, os.Competences, 
                os.Remuneration_Base, os.Dates, e.Nom_Entreprise
        FROM Offre_De_Stage os
        JOIN Entreprise e ON os.Id_Entreprise = e.Id_Entreprise";
        
        $stmt = $this->pdo->query($sql);
        
        // Debugging: Vérifie si la requête renvoie des résultats
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            // Si aucune donnée n'est récupérée, affiche une erreur ou un message
            echo "Aucune donnée trouvée dans la base de données";
            return [];
        }
    }
    

    public function getOffreById($id) {
        $sql = "SELECT os.Id_Offre_De_Stage, os.Titre, os.Description, os.Competences, 
                       os.Remuneration_Base, os.Dates, e.Nom_Entreprise
                FROM Offre_De_Stage os
                JOIN Entreprise e ON os.Id_Entreprise = e.Id_Entreprise
                WHERE os.Id_Offre_De_Stage = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

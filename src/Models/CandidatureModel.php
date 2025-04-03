<?php
namespace App\Models;

use App\Models\Database;
use PDO;

class Candidature {
    
    public static function ajouterCandidature($id_etudiant, $id_offre, $cv_path, $lettre_path) {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=localhost;dbname=nom_de_base_de_donnees", "utilisateur", "motdepasse");
        
        // Insertion dans la table Candidature
        $sql = "INSERT INTO Candidature (Date_Candidature, CV, Lettre_De_Motivation, Id_Offre_De_Stage, Id_Utilisateur, Id_Etudiant)
                VALUES (NOW(), :cv, :lettre, :id_offre, :id_utilisateur, :id_etudiant)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cv', $cv_path);
        $stmt->bindParam(':lettre', $lettre_path);
        $stmt->bindParam(':id_offre', $id_offre);
        $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur']);
        $stmt->bindParam(':id_etudiant', $id_etudiant);
        
        return $stmt->execute();
    }
}

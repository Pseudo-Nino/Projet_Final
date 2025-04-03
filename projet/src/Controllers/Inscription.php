<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\EtudiantModel;
use App\Models\PiloteModel;
use App\Models\EntrepriseModel;

class Inscription {
    private $utilisateurModel;
    private $etudiantModel;
    private $piloteModel;
    private $entrepriseModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
        $this->etudiantModel = new EtudiantModel();
        $this->piloteModel = new PiloteModel();
        $this->entrepriseModel = new EntrepriseModel();
    }

    public function handleInscription() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $email = trim($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe
            $confirmPassword = $_POST['confirm-password'];
            $role = $_POST['role']; // Récupérer le rôle
            $etablissement = $_POST['etablissement'];
            $promotion = $_POST['promotion'];

            // Vérification du mot de passe
            if (!password_verify($confirmPassword, $password)) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }

            // Vérifier si l'utilisateur existe déjà
            if ($this->utilisateurModel->getUtilisateurByEmail($email)) {
                echo "Cet email est déjà utilisé.";
                return;
            }

            // Ajouter l'utilisateur dans la table Utilisateur
            $idUtilisateur = $this->utilisateurModel->ajouterUtilisateur($email, $password);
            if (!$idUtilisateur) {
                echo "Erreur lors de l'inscription.";
                return;
            }

            // Ajouter les informations spécifiques selon le rôle
            if ($role === "etudiant") {
                $this->etudiantModel->ajouterEtudiant($idUtilisateur, $nom, $prenom, $email, $password, $etablissement, $promotion);
            } elseif ($role === "pilote") {
                $poste = $_POST['poste'] ?? "Pilote"; // Poste par défaut
                $this->piloteModel->ajouterPilote($idUtilisateur, $nom, $prenom, $poste, $etablissement);
            } elseif ($role === "entreprise") {
                $nomEntreprise = $_POST['nom_entreprise'] ?? "";
                $domaineActivite = $_POST['domaine_activite'] ?? "";
                $ville = $_POST['ville'] ?? "";
                $this->entrepriseModel->ajouterEntreprise($idUtilisateur, $nomEntreprise, $domaineActivite, $ville);
            }

            echo "Inscription réussie !";
        }
    }
}

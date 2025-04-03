<?php 
namespace App\Controllers;

use App\Models\CandidatureModel;
use App\Models\OffreDeStage;
use App\Models\UtilisateurModel;
use App\Models\EtudiantModel;

class CandidatureController {

    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function afficherFormulaire($id_offre) {
        // Vérifiez si l'utilisateur est connecté et si c'est un étudiant
        session_start();
        if (!isset($_SESSION['id_utilisateur']) || !isset($_SESSION['id_etudiant'])) {
            header('Location: index.php?page=connexion');
            exit();
        }
        // Récupérer les détails de l'offre de stage
        $offre = OffreDeStage::getOffreById($id_offre);
        echo $this->twig->render('CandidatureForm.html.twig', ['offre' => $offre]);
    }

    public function soumettreCandidature() {
        // Logique pour soumettre la candidature
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_etudiant = $_SESSION['id_etudiant'];
            $id_offre = $_POST['id_offre'];

            // Récupérer les fichiers envoyés (CV et lettre de motivation)
            $cv = $_FILES['cv'];
            $lettre = $_FILES['lettre'];

            // Traiter les fichiers et déplacer vers le dossier de destination
            $cv_path = "uploads/cvs/" . basename($cv['name']);
            $lettre_path = "uploads/lettres/" . basename($lettre['name']);
            move_uploaded_file($cv['tmp_name'], $cv_path);
            move_uploaded_file($lettre['tmp_name'], $lettre_path);

            // Créer une nouvelle candidature
            $candidature = new Candidature();
            $candidature->ajouterCandidature($id_etudiant, $id_offre, $cv_path, $lettre_path);

            // Rediriger l'utilisateur vers une page de confirmation ou une page d'accueil
            header('Location: index.php?page=accueil');
            exit();
        }
    }
}

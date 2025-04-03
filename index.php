<?php
session_start();
/**
 * This is the router, the main entry point of the application.
 * It handles the routing and dispatches requests to the appropriate controller methods.
 */

require "vendor/autoload.php";

use App\Controllers\Page_Accueil;
use App\Controllers\Inscription;
use App\Controllers\Connexion;
use App\Controllers\OffreEmploi;
use App\Controllers\AvisEntreprise;
use App\Controllers\VoirOffre1;
use App\Controllers\VoirOffre2;
use App\Controllers\OffreDeStageController;
use App\Controllers\CandidatureController;

// Charger Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true, 
    'cache' => false
]);

// Récupérer la page demandée
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
$offreController = new OffreDeStageController($twig);

// Logique de routage
try {
    switch ($page) {
        case 'inscription':
            $controller = new Inscription($twig);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $controller->handleInscription();
            } else {
                echo $twig->render('Inscription.html.twig');
            }
            break;

        case 'connexion':
            $controller = new Connexion($twig);
            echo $twig->render('Connexion.html.twig');
            break;

        case 'avis_entreprise':
            $controller = new AvisEntreprise($twig);
            echo $twig->render('AvisEntreprise.html.twig');
            break;

        case 'accueil':
            $controller = new Page_Accueil($twig);
            echo $twig->render('index.html.twig');
            break;

        case 'voiroffre1':
            $controller = new VoirOffre1($twig);
            echo $twig->render('VoirOffre1.html.twig');
            break;

        case 'voiroffre2':
            $controller = new VoirOffre2($twig);  
            echo $twig->render('VoirOffre2.html.twig');
            break;

        case 'offres_stage':
            $offreController->afficherOffres();
            break;
    
        case 'voir_offre_stage':
            if (isset($_GET['id'])) {
                $offreController->voirOffre($_GET['id']);
            } else {
                    echo $twig->render('404.html.twig', ['message' => "ID de l'offre manquant"]);
            }
            break;

            case 'candidature':
                $controller = new CandidatureController($twig);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $controller->soumettreCandidature();
                } else {
                    if (isset($_GET['id'])) {
                        $controller->afficherFormulaire($_GET['id']);
                    } else {
                        echo $twig->render('404.html.twig', ['message' => "ID de l'offre manquant"]);
                    }
                }
                break;
            
    }
} catch (Exception $e) {
    // Gestion des erreurs
    echo "Erreur : " . $e->getMessage();
}

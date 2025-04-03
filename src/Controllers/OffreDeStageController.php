<?php
namespace App\Controllers;

use App\Models\OffreDeStage;
use Twig\Environment;

class OffreDeStageController {
    private $twig;
    private $offreModel;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
        $this->offreModel = new OffreDeStage();
    }

    public function afficherOffres() {
        $offres = $this->offreModel->getAllOffres();
        echo $this->twig->render('OffreDeStage.html.twig', ['offres' => $offres]);
    }

    public function voirOffre($id) {
        $offre = $this->offreModel->getOffreById($id);
        if ($offre) {
            echo $this->twig->render('VoirOffre.html.twig', ['offre' => $offre]);
        } else {
            echo $this->twig->render('404.html.twig', ['message' => "Offre introuvable"]);
        }
    }
}
?>

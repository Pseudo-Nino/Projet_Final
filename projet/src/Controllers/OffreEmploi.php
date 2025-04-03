<?php
namespace App\Controllers;

class OffreEmploi extends Controller {

    public function __construct($templateEngine) {
        $this->templateEngine = $templateEngine;
    }

    public function showOffreEmploi()
    {
        return $this->templateEngine->render('OffreEmploi.html.twig');
    }

}

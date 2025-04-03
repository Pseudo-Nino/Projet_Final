<?php 
namespace App\Controllers;

class Connexion extends Controller {

    public function __construct($templateEngine) {
        $this->templateEngine = $templateEngine;
    }

    public function showConnexion()
    {
        echo $this->templateEngine->render('Connexion.html.twig'); 
        echo"not working";
    }

}

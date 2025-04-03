<?php 
namespace App\Controllers;

class AvisEntreprise extends Controller {

    public function __construct($templateEngine) {
        $this->templateEngine = $templateEngine;
    }

    public function showEntreprise()
    {
        echo $this->templateEngine->render('AvisEntreprise.html.twig'); 
        echo"not working";
    }

}
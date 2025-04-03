<?php 
namespace App\Controllers;

class VoirOffre1 extends Controller {

    public function __construct($templateEngine) {
        $this->templateEngine = $templateEngine;
    }

    public function showOffre1()
    {
        echo $this->templateEngine->render('VoirOffre1.html.twig'); 
        echo"not working";
    }

}
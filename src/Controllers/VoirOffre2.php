<?php 
namespace App\Controllers;

class VoirOffre2 extends Controller {

    public function __construct($templateEngine) {
        $this->templateEngine = $templateEngine;
    }

    public function showOffre2()
    {
        echo $this->templateEngine->render('VoirOffre2.html.twig'); 
        echo"not working";
    }

}
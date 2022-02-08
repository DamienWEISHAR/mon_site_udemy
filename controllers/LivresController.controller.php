<?php

require_once 'models/LivreManager.class.php';

class LivresController{

    //attributs
    private $livreManager;

    //constructeur
    public function __construct(){
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();
    }

    //methodes
    public function afficherLivres(){

        //récupération de tous les livres, dispo dans la variables $livres, qui est dispo aussi dans la vue    
        $livres = $this->livreManager->getLivres();

        require 'views/livres.view.php';
    }
}

?> 
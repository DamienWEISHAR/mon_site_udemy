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

    public function afficherUnLivre($id){
        $livre = $this ->livreManager->getLivreById($id);
        //nouvelle vue pour afficher un livre spécifique en ayant cliquer sur un livre
        require 'views/afficherLivre.view.php';
    }
}

?> 
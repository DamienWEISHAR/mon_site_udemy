<?php

class LivreManager {

    //attributs
    private $livres; //le tableau des livres


    //constructeur ===> pas nécessaire dans ce cas-là



    //getters et setters

    //pour récupérer les livres du tableau $livres
    public function getLivres(){
        return $this->livres;
    }


    //methodes
    public function ajoutLivre($livre){
        $this->livres[] = $livre; //ajout du livre instancié à la fin du tableau
    }


}

?>
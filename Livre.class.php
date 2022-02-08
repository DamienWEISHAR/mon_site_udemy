<?php

class Livre{

    // attributs

    private $id;
    private $titre;
    private $nbPages;
    private $image;


    //SUPPRESSION DE L'ATTRIBUT STATIC car il n'existe plus: public static $livres; 
       
 
    //constructeur

    public function __construct($id, $titre, $nbPages, $image){

        //$this-id fait référence à l'attribut, tandis que $id fait référence au paramètre de la fonction
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;

        //SUPPRESSION DE L'ATTRIBUT STATIC car il n'existe plus, et donc l'appel self:: $livres[] = $this;
        
    }


    //getters et setters
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getTitre(){
        return $this->titre;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function getNbPages(){
        return $this->nbPages;
    }
    public function setNbPages($nbPages){
        $this->nbPages = $nbPages;
    }

    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

}

?>
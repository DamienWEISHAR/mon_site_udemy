<?php


require_once 'Model.class.php';
require_once 'Livre.class.php'; //on appelle la classe dans le foreach de chargementLivres();

class LivreManager extends Model {

    //attributs
    private $livres; //le tableau des livres


    //constructeur ===> pas nécessaire dans ce cas-là



    //getters et setters

    //pour récupérer les livres du tableau $livres
    public function getLivres(){
        return $this->livres;
    }


    //methodes
    
    //ajouter des livres:
    public function ajoutLivre($livre){
        $this->livres[] = $livre; //ajout du livre instancié à la fin du tableau
    }
    //charger des livres (par une requête SQL préparée)
    public function chargementLivres(){
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC); //permet d'éviter les doublons, la variable $mesLivres est le tableau associatif contenant tous les livres
        $req->closeCursor();

        //on va parcourir le tableau $mesLivres pour créer des objets de type $livre et générer des livres
        foreach($mesLivres as $livre){
            //on crée une variable qui instancie la class Livre pour créer un nouveau livre
            $l = new Livre ($livre['id'],$livre['titre'],$livre['nbPages'],$livre['image']);
            //ajout des livres créés dans la variable $l
            $this->ajoutLivre($l);
        }
    }

    public function getLivreById($id){
        //on parcourt le tableau de $livres
        for ($i=0; $i < count($this->livres); $i++){
            //comparaison de l'id du livre instancié (donc $this) avec l'id transféré en paramètre de la fonction
            if ($this->livres[$i]->getId() === $id){
                return $this->livres[$i];
            }


        }
    }



}

?>
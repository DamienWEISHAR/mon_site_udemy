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

    public function ajoutLivre(){
        require 'views/ajoutLivre.view.php';
    }

    public function ajoutLivreValidation(){
        $file = $_FILES['image'];
        


    }

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name'])){
            throw new Exception("Vous devez indiquer une image!");
        }
        if(!file_exists($dir)) mkdir($dir, 0777);

        //verification de l'extension
        $extension =strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        //pour créer un chiffre random entre 0 et 99999
        $random = rand(0,99999);
        /*donner un nouveau nom avec le répertoire et un chiffre random
        permet d'avoir plusieurs fois le même fichier image mais de ne pas écraser l'autre
        et de pouvoir l'utiliser à plusieurs endroits différents */
        $target_file = $dir.$random."_".$file['name'];

        /*tests de vérification */

        //est-ce une image?
        if(!getimagesize($file["tmp_name"])){
            throw new Exception("Ceci n'est pas une image!");
        }
        //bonne extension?
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif" ){
            throw new Exception("L'extension du fichier n'est pas reconnu!");
        }
        //déjà existant?
        if(file_exists($target_file)){
            throw new Exception("Le fichier existe déjà!");
        }
        //fichier trop lourd?
        if($file['size'] > 50000){
            throw new Exception("Fichier trop volumineux!");
        }
        //fichier déplacé?
        if(!move_uploaded_file($file['tmp_name'], $target_file)){
            throw new Exception("L'ajout de l'image n'a pas fonctionné!");
        }
        //sinon, retourne le nom du fichier (renommé avec la concaténation)
        else{
            return ($random."_".$file['name']);
        }

    }


}

?> 
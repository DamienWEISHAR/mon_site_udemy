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

    /**********************************************
     *              METHODES
     **********************************************/

     
    public function afficherLivres(){
        //récupération de tous les livres, dispo dans la variables $livres, qui est dispo aussi dans la vue    
        $livres = $this->livreManager->getLivres();
        require 'views/livres.view.php';
    }

/*********************************************** */

    public function afficherLivre($id){
        $livre = $this ->livreManager->getLivreById($id);
        //nouvelle vue pour afficher un livre spécifique en ayant cliquer sur un livre
        require 'views/afficherLivre.view.php';
    }

/*********************************************** */

    public function ajoutLivre(){
        require 'views/ajoutLivre.view.php';
    }

 /*********************************************** */

    public function ajoutLivreValidation(){
        $file = $_FILES['image'];
        $repertoire ="public/images/";
        $nomImageAjoute= $this->ajoutImage($file, $repertoire);
        $this->livreManager->ajoutLivreBd($_POST['titre'],$_POST['nbPages'],$nomImageAjoute);
        header('Location:' . URL ."livres");
    }

 /*********************************************** */

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
        if($file['size'] > 500000){
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

 /*********************************************** */

    public function suppressionLivre($id){
        //récupération de l'image
        $nomImage = $this->livreManager->getLivreById($id)->getImage();
        //suppression de l'image dans le répertoire
        unlink("public/images/".$nomImage);
        //suppression en bdd
        $this->livreManager->suppressionLivreBd($id);
        header('Location:'. URL ."livres");
    }

 /*********************************************** */

    public function modificationLivre($id){
        //récupération de l'id du livre
        $livre = $this->livreManager->getLivreById($id);
        //affichage de la vue 
        require "views/modifierLivre.view.php";

    }

 /*********************************************** */

    public function modificationLivreValidation(){
        //récupération de l'image que l'on veut modifier
        $imageActuelle = $this->livreManager->getLivreById($_POST['identifiant'])->getImage();

        //vérification si l'utilisateur a sélectionné une nouvelle image, ou pas
        $file = $_FILES['image'];

        if($file['size'] > 0){
            unlink("public/images/".$imageActuelle);
            //ces 2 lignes permettent l'ajout du livre dans le répertoire
            $repertoire ="public/images/";
            $nomImageToAdd= $this->ajoutImage($file, $repertoire);
        }else{
            //l'image à remplacer reste l'image que l'on a actuellement
            $nomImageToAdd= $imageActuelle;
        }
        $this->livreManager->modificationLivreBd($_POST['identifiant'],$_POST['titre'],$_POST['nbPages'], $nomImageToAdd);
        header('Location:'. URL ."livres");
    }
}

?>  
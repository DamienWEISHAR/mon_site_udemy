<?php

//pour enlever 'index.php', puis une fonction ternaire pour savoir si on est en https ou pas, puis serveur permettant d'avoir la page actuelle
define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once 'controllers/LivresController.controller.php';
$livreController = new LivresController;



try{
    if(empty($_GET['page'])){
        require 'views/accueil.view.php';
    } else {
        //explosion de l'url à partir de / et permettant d'avoir d'autres cases dans le tableau d'url
        // FILTER_SANITIZE_URL permet de supprimer tous les caractères sauf lettres / chiffres / certains caractères spéciaux
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch($url[0]){
            case "accueil":
                require 'views/accueil.view.php';
            break;
            case "livres":
                if (empty($url[1])){
                    $livreController->afficherLivres();
                }else if ($url[1] === "l"){
                    $livreController->afficherLivre($url[2]);
                }else if ($url[1] === "a"){
                    $livreController->ajoutLivre();
                }else if ($url[1] === "m"){
                    $livreController->modificationLivre($url[2]);
                }else if ($url[1] === "s"){
                    $livreController->suppressionLivre($url[2]);
                }else if ($url[1] === "av"){
                    $livreController->ajoutLivreValidation();
                }else if ($url[1] === "mv"){
                    $livreController->modificationLivreValidation();
                }else{
                    throw new Exception ("la page n'existe pas");
                }
            break;
            default :  throw new Exception ("la page n'existe pas");
            

        }
    }

}catch (Exception $e){
    $msg = $e->getMessage();
    require "views/error.view.php";
}



?>
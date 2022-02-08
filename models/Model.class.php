<?php


//asbtract pour pas qu'elle soit intanciée directement mais ce sont les classes qui héritent qui seront instanciées
abstract class Model {

    //attributs

    // static pour que toutes les pages qui héritent de Model puissent utiliser $pdo
    private static $pdo;

    //construct ==> vide

    //getter et setter ==> vide

    //methodes
    private static function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=essai_livres;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //protected = utilisable par les class enfants, mais pas personne d'autre
    //vérification si $pdo est vide ou non, si elle est nulle, creation d'une connexion avec setBdd()
    //puis on retourne le résultat de $pdo
    protected function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }
}


?>
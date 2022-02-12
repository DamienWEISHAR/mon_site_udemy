<?php 
// SUPPRESSION CAR APPEL PAR LivreManager
// require_once 'Livre.class.php';

// SUPPRESSION CAR DEJA EN BDD et appel des fonctions nécessaires
// $l1 = new Livre (1,"Bleach", 250, "bleach.jpg");
// $l2 = new Livre (2,"Dragon Ball", 250, "dbz.jpg");
// $l3 = new Livre (3,"MHA", 250, "mha.jpg");
// $l4 = new Livre (1,"Nartuo", 250, "naruto.jpg");
// $l5 = new Livre (1,"One Piece", 250, "op.jpg");
// $l6 = new Livre (1,"Saint Seiya", 250, "ss.jpg");

//suppression de $livres = [$l1, $l2, $l3, $l4, $l5, $l6]; car $livres est accessible par la classe Livre

//on retrouve ça dans LivresController.controller.php, dans le constructeur
// require_once 'LivreManager.class.php';
// $livreManager = new LivreManager; //on ne met pas les (), car pas de constructeur, on ne fait appel qu'à la classe LivreManager

// SUPPRESSION CAR DEJA EN BDD et appel des fonctions nécessaires
// $livreManager-> ajoutLivre($l1); //appel de la fonction ajoutLivre, appliquée à la varibale $livreManager
// $livreManager-> ajoutLivre($l2);
// $livreManager-> ajoutLivre($l3);
// $livreManager-> ajoutLivre($l4);
// $livreManager-> ajoutLivre($l5);
// $livreManager-> ajoutLivre($l6);
//$livreManager contient donc tous les livres maintenant

//on retrouve ça dans LivresController.controller.php, dans le constructeur
//ici on teste si y a une connexion et si on affiche tous les livres 
// $livreManager->chargementLivres();


ob_start(); //permet de mettre en temporisation du code qui sera utilisé plus tard
?> 

<!-- class faite avec bootstrap -->
<table class="table text-center">
    
    <!-- tableau: première ligne, avec nom des colonnes -->
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <!-- colspan permet de grouper le nombre de colonne que l'on veut dans une seule -->
        <th colspan = "2">Actions</th>
    </tr>

    <?php 
    //SUPPRESSION CAR CA DOIT ETRE DANS LE CONTROLLER ET PAS DANS LA VUE, qui ne fait qu'afficher!
        //creation d'une variable récupérant tous les livres, et permet une écriture plus facile dans les appels, un peu plus bas
    // $livres = $livreManager->getLivres();


        // création d'une boucle for pour parcourir le tableau des livres 
        // utilisation de la fonction count() pour avoir la taille du tableau
        // utilisation de la classe Livre :: pour appeler l'attribut static dont on a besoin
        //$livres n'existant plus, on va faire appel à $livreManager et lui appliquer la fonction getLivres() pour retourner le tableau de livres
    for($i=0; $i <(count($livres));$i++) : ?>

        <!-- Suppression de tous les livres pour ne garder que la structure d'un seul livre -->

    <tr>

        <!-- $livreManager->getLivres()[$i] permet de récupérer un livre dans le tableau, et on lui applique la fonction getImage -->
        <!-- $livreManager->getLivres() est maintenant dans la variable $livres (cf. plus haut), donc on remplace pour la lisibilité -->
        <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage()?>" alt="" width="60px"></td>
        
        <!-- $livre[$i] pour dire qu'au 1er tour de boucle, on a $l1, 
        2eme tour on aura $l2 etc...  
        On applique les fonctions que l'on veut appliquer pour récupérer les données que l'on veut-->

        <!-- balise a href pour arriver aux détails quand on clic sur le titre -->
        <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $livres[$i]->getID(); ?>"><?= $livres[$i]->getTitre(); ?></a></td>
        <td class="align-middle"><?= $livres[$i]->getNbPages()?></td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
            <!-- création d'une popup dès qu'on clique sur Supprimer -->
            <form method="POST" action="<?= URL ?>livres/s/<?=$livres[$i]->getId();?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ce livre?');" >
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>

    <!-- endfor permet d'arrêter la boucle for, en ayant de l'html au milieu -->
    <?php endfor;  ?>
  
     
</table>
<!-- Bouton ajouter -->
<a href="<?= URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php

$content =ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Les livres de Manga4all";
require 'template.php';

?>
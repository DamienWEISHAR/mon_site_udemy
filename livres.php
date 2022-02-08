<?php 

require_once 'Livre.class.php';

$l1 = new Livre (1,"Bleach", 250, "bleach.jpg");
$l2 = new Livre (2,"Dragon Ball", 250, "dbz.jpg");
$l3 = new Livre (3,"MHA", 250, "mha.jpg");
$l4 = new Livre (1,"Nartuo", 250, "naruto.jpg");
$l5 = new Livre (1,"One Piece", 250, "op.jpg");
$l6 = new Livre (1,"Saint Seiya", 250, "ss.jpg");

$livres = [$l1, $l2, $l3, $l4, $l5, $l6]; //tableau contenant tous les livres


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

    <?php //création d'une boucle for pour parcourir le tableau des livres
    //utilisation de la fonction count() pour avoir la taille du tableau
    for($i=0; $i <(count($livres));$i++) : ?>

        <!-- Suppression de tous les livres pour ne garder que la structure d'un seul livre -->
    <tr>
        <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage()?>" alt="" width="60px"></td>
        <!-- $livre[$i] pour dire qu'au 1er tour de boucle, on a $l1, 
        2eme tour on aura $l2 etc...  
        On applique les fonctions que l'on veut appliquer pour récupérer les données que l'on veut-->
        <td class="align-middle"><?= $livres[$i]->getTitre()?></td>
        <td class="align-middle"><?= $livres[$i]->getNbPages()?></td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <!-- enfor permet d'arrêter la boucle for, en ayant de l'html au milieu -->
    <?php endfor;  ?>
  
     
</table>
<!-- Bouton ajouter -->
<a href="" class="btn btn-success d-block">Ajouter</a>

<?php

$content =ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Les livres de Manga4all";
require 'template.php';

?>
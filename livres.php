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

        <!-- ma première ligne, avec mon premier livre -->
    <tr>
        <td class="align-middle"><img src="public/images/bleach.jpg" alt="" width="60px"></td>
        <td class="align-middle">Bleach, tome 1</td>
        <td class="align-middle">250</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
   <!-- Mon deuxième livre -->
    <tr>
        <td class="align-middle"><img src="public/images/dbz.jpg" alt="" width="60px"></td>
        <td class="align-middle">Dragon Ball, tome 1</td>
        <td class="align-middle">250</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <!-- Mon troisième livre -->
    <tr>
        <td class="align-middle"><img src="public/images/mha.jpg" alt="" width="60px"></td>
        <td class="align-middle">My Hero Academia, tome 1</td>
        <td class="align-middle">250</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <!-- Mon quatrième livre -->
    <tr>
        <td class="align-middle"><img src="public/images/naruto.jpg" alt="" width="60px"></td>
        <td class="align-middle">Naruto, tome 1</td>
        <td class="align-middle">250</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <!-- Mon cinquième livre -->
    <tr>
        <td class="align-middle"><img src="public/images/op.jpg" alt="" width="60px"></td>
        <td class="align-middle">One Piece, tome 1</td>
        <td class="align-middle">250</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <!-- Mon sixième livre -->
    <tr>
        <td class="align-middle"><img src="public/images/ss.jpg" alt="" width="60px"></td>
        <td class="align-middle">Saint Seiya, tome 1</td>
        <td class="align-middle">250</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
     
</table>
<!-- Bouton ajouter -->
<a href="" class="btn btn-success d-block">Ajouter</a>

<?php

$content =ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Les livres de Manga4all";
require 'template.php';

?>
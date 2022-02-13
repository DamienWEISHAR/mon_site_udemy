<?php 

ob_start(); //permet de mettre en temporisation du code qui sera utilisé plus tard
?> 

<form method="POST" action="<?=URL?>livres/mv" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="titre">Titre : </label>
        <!-- value correspond à la valeur initiale du champ qui peut ensuite être modifiée par l'utilisateur-->
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->getTitre(); ?>">
    </div>
    <div class="form-group">
        <label for="nbPages">NbPages : </label>
        <input type="number" class="form-control" id="nbPages" name="nbPages" value="<?= $livre->getNbPages(); ?>">
    </div>
    <h3>Image actuelle:</h3>
    <img src="<?= URL ?>public/images/<?= $livre->getImage();?>" alt="">
    <div class="form-group">
        <label for="image">Changer l'image </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?=$livre->getId(); ?>" >
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

$content =ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Modification du livre: ".$livre->getId(); //permet de récupérer l'id du livre correspondant

require 'template.php';

?>
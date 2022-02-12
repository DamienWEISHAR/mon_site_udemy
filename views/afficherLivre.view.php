<?php
ob_start();

?>

<div class="row">
    <div class="col-6">
        <!-- permet d'afficher l'image du livre -->
        <img src="<?=URL?>public/images/<?=$livre->getImage();?>" alt="">
    </div>
    <div class="col-6">
        <!-- permet d'afficher le titre d'un livre -->
        <p>Titre : <?= $livre->getTitre();?> </p>
        <p>Nombre de pages : <?= $livre->getNbPages();?> </p>
    </div>
</div>

<?php
$content = ob_get_clean();
//affichage du titre du livre 
$titre = $livre->getTitre();
require "template.php";

?>
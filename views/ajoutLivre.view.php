<?php 
ob_start(); //permet de mettre en temporisation du code qui sera utilisé plus tard
?> 
<!-- enctype permet de récupérer les images uploadées sinon ça ne marche pas -->
<form method="POST" action="<?=URL?>livres/av" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <div class="form-group">
        <label for="nbPages">NbPages : </label>
        <input type="number" class="form-control" id="nbPages" name="nbPages">
    </div>
    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php

$content =ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Ajout d'un livre";

require 'template.php';

?>
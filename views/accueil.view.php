<?php 

ob_start(); //permet de mettre en temporisation du code qui sera utilisé plus tard
?> 


Ici la page d'accueil


<?php

$content =ob_get_clean(); // permet de déverser tout ce qu'il y a entre ob_start et ob_get_clean
$titre = "Manga4all";

require 'template.php';

?>
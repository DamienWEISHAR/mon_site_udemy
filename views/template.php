<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Manga 4 All</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>livres">Livres</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- la class=container en bootstrap permet d'avoir des marges à gauche et à droite de la page -->
    <div class=container> 
        <!-- rounded = arrondi, border=bordure, border-dark= bordure sombre
            p-2 = padding de 2, m-2= margin de 2, text-center= texte centré dans la balise h1
            text-white = texte en blanc, bg-info= background en bleu-vert, 
            les couleur sont définies par le framework
            Si on veut une couleur personnalisée, il faut le faire dans un fichier css à part
         -->
        <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-info" ><?= $titre ?></h1>
    
    <!-- Permet de déverser le contenu des autres pages, index.php et livres.php -->
    <!-- écriture alternative des balises php, permer d'éviter les echo pour les variables -->
        <?=$content?> 
    </div>
   

<!-- JS de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- JS de Bootstrap -->
</body>
</html>
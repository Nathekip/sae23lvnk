<?php

function setup() {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>';
    }

function pagenavbar($page){
  $rep = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item p01">
                    <a class="nav-link p01" href="index.php">Page d'accueil</a>
                </li>
                <li class="nav-item p02">
                    <a class="nav-link" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item p03">
                    <a class="nav-link active" href="page04.php">Informations</a>
                </li>
                <li class="nav-item p04 active">
                    <a class="nav-link" href="page05.php">Panier</a>
                </li>
            </ul>
            </nav>
    EOD; 
  $rep = str_replace($page, 'active', $rep);
  return $rep;
}


?>

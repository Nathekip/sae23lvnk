<?php

function setup() {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>';
    }

function pagenavbar($page){
  $rep = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page04.php">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page05.php">Placeholder</a>
                </li>
            </ul>
            </nav>
    EOD; 
  $rep = str_replace("Placeholder", $page, $rep);
  return $rep;
}


?>

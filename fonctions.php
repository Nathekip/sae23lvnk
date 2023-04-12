<?php

function setup() {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">';
    }

function pagenavbar($page){
  $rep = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            

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

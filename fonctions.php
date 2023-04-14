<?php

function setup() {
    session_start();
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>';
    
    $nomFichier = basename($_SERVER["SCRIPT_NAME"], ".php");
    $rep = "NomDuSite";
    $titre = ["Page d'accueil","Formulaire","Informations","Panier"];
    $key = intval(substr($string, -1))-1;
    $rep = $titre[$key];
    echo '<title>$rep</title>';       
    }

function pr() {
    echo '<pre> Session :<br>';
    print_r($_SESSION);
    echo '<br> Post :<br>';
    print_r($_POST);
    echo '</pre>';
}

function pagenavbar($page){
  $rep = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link p01" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p02" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p03" href="page03.php">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p04" href="page04.php">Panier</a>
                </li>
            </ul>
            </nav>
    EOD; 
  $rep = str_replace($page, 'active', $rep);
  return $rep;
}


?>

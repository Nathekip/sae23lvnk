<?php

function setup() {
    session_start();
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>';
    
    $nomFichier = basename($_SERVER["SCRIPT_NAME"], ".php");
    $titre = ["Page d'accueil","Formulaire","Informations","Panier"];
    $key = intval(substr($nomFichier, -1))-1;
    $rep = $titre[$key];
    if ($rep == NULL){
    $rep = "NomDuSite";}
    echo "<title>$rep</title>";
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

function pageheader(){
    echo '<header>
    <div class="container-fluid bg-info text-center py-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center mx-auto">
    <a href="page01.php"><img class="rounded mr-3" src="images/logo.png" alt="logo"></a>
    <lass="mb-0 flex-fill text-center">Biblionet</h1>
    </div>';
    if(isset($_SESSION['utilisateur'])){
        /*echo "$_SESSION['utilisateur']
        <a href='deconnexion.php' class='btn btn-warning btn-sm'>Se déconnecter</a>";
    }
    else { */
        echo "Vous n'êtes pas connectés
        <a href='connexion.php' class='btn btn-warning btn-sm'>Connexion</a>";
    }
    echo '</div>
    </header>';
  }
    

?>

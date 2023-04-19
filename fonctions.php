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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            

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
        echo "<a href='deconnexion.php' class='btn btn-warning btn-sm'>Se déconnecter</a>";
        /*echo "$_SESSION['utilisateur']
        <a href='deconnexion.php' class='btn btn-warning btn-sm'>Se déconnecter</a>";*/
    }
    else { 
        echo 'Vous n\'êtes pas connectés
        <a href="connexion.php" class="btn btn-warning btn-sm">Connexion</a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Open modal
          </button>
        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                Modal body..
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
           </div>';
    }
    echo '</div>
    </header>';
  }
    

?>

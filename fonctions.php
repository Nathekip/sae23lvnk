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
  echo $rep;
  /* if ($_SESSION['msg']){
      echo "<div class='container'>
                  <div class='alert alert-danger'>
                      <strong>Erreur</strong> Le mot de passe ou l'identifiant sont invalides.
                  </div>
              <div>
        ";
      sleep(20);
      $_SESSION['msg'] = False;
      header("Refresh:0");
      } */
     
}

function pageheader(){
    echo '<header>
    <div class="container-fluid bg-info text-center py-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center mx-auto">
    <a href="page01.php"><img class="rounded mr-3" src="images/logo.png" alt="logo"></a>
    <lass="mb-0 flex-fill text-center">Biblionet</h1>
    </div>';
    if(isset($_SESSION['utilisateur'])){
        echo $_SESSION['utilisateur'];
        $btndeco = '<form action="deconnexion.php" method="post">
        <button type="submit" name="page" value=NUMERODEPAGE class="btn btn-warning btn-sm">Se déconnecter</button>
        </form>';
        $btndeco = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $btndeco);
        echo $btndeco;
    }
    else { 
        $boutons = 'Vous n\'êtes pas connectés
          <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
            Connexion
          </button>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content bg-light">

              <!-- Modal Header -->
              <div class="modal-header bg-secondary">
                <h4 class="modal-title">Connexion (texte centré)</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body text-center">


                         <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center bg-white">
                            <div class="d-flex align-items-center mx-auto">
                            <div class="login-form">
                              <form action="NUMERODEPAGE.php" id="#Formulaire" method="post">
                                <div class="form-group">
                                  <label>Utilisateur</label>
                                  <input type="text" class="form-control" name="utilisateur" placeholder="Utilisateur">
                                </div>
                                <div class="form-group">
                                  <label>Mot de passe</label>
                                  <input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe">
                                </div>
                                <button type="submit" name="page" value=NUMERODEPAGE class="btn btn-success">Se connecter</button>
                              </form>
                              <div><a href="creerprofil.php">Pas de profil ? (décaler à gauche)</a></div>
                              <div><a href="creerprofil.php">Mot de passe oublié ? (décaler à droite)</a></div>
                            </div>
                          </div>
                          


              </div>

              <!-- Modal footer -->
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
              </div>

            </div>
           </div>
            <script>
            $("#Formulaire").submit(function(e) {
            e.preventDefault();
            });
            </scipt>';
        
        $boutons = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $boutons);
        echo $boutons;
                
    }
    echo '</div>
    </header>';
    
    
    
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
    $_SESSION['msg'] = False;
    $page = "Location: ".$_POST['page'].".php";

    foreach($user as $u){
      if ((password_verify($_POST['motdepasse'],$u['mdp'])==1) && ($_POST['utilisateur']==$u['user']))
      {
          $_SESSION['utilisateur']=$_POST['utilisateur'];
          $_SESSION['role']=$u['role'];
          $_SESSION['msg'] = True;
          header($page);
     }
    }
  }
    

  function addUser($usr, $mdp, $role="user"){
    echo "<br>working on it...<br>";
    $user = array();
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);

    $add = array();
    $add['user']=$usr;
    $add['mdp']=password_hash($mdp,PASSWORD_DEFAULT);
    $add['role']=$role;
    $user[$add['user']]=$add;

    $fp = fopen("data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

?>

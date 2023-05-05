<?php

function setup() {
    session_start();
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        ';
    
    $listetitre = ["Page d'accueil","Formulaire","Informations","Panier","Création de Profil","Mot de passe oublié","Mon Profil"];
    $rep = $listetitre[intval(substr(basename($_SERVER["SCRIPT_NAME"], ".php"), -1))-1];
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

function pagenavbar($page=""){
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
                    <li class="nav-item">
                        <a class="nav-link p07" href="Monprofil7.php">Mon Profil</a>
                    </li>
                </ul>
                </nav>
            EOD; 
  $rep = str_replace($page, 'active', $rep);
  echo $rep;
    
}

function pageheader(){
    echo '<header>
    <div class="container-fluid bg-info text-center py-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center mx-auto">
    </div>';
    
    
    #si l'utilisateur existe, ça veut dire qu'il est identifié
    
    if(isset($_SESSION['utilisateur'])){
        echo "<div class='pe-2'>".$_SESSION['utilisateur']."</div>";
        $btndeco = '<form action="deconnexion.php" method="post">
        <button type="submit" name="page" value=NUMERODEPAGE class="btn text-black btn-outline-warning btn-info btn-sm">Se déconnecter</button>
        </form>';
        $btndeco = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $btndeco);
        echo $btndeco;
    }
    
    #si l'utilisateur n'existe pas, ça veut dire qu'il n'est pas identifié
    
    else { 
        $boutons = '<div class="pe-2"> Vous n\'êtes pas connecté </div>
        
          <button type="button" class="btn text-black btn-outline-warning btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
  Connexion
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content bg-light">

      <!-- Modal Header -->
      <div class="modal-header bg-secondary text-center">
        <h4 class="modal-title text-white mx-auto">Connexion</h4>
        <button type="button" class="btn-close bg-danger btn-outline-dark" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-center">
        <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center bg-white">
          <div class="d-flex align-items-center mx-auto">
            <div class="login-form">
              <form action="NUMERODEPAGE.php" id="login-form" method="post">
                <div class="pt-3 form-group">
                  <label>Utilisateur</label>
                  <input type="text" class="form-control" name="utilisateur" placeholder="Utilisateur">
                </div>
                <div class="pt-3 form-group">
                  <label>Mot de passe</label>
                  <input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe">
                </div>
                <div class="pt-4">
                  <button type="submit" name="page" value=NUMERODEPAGE class="btn text-white btn-dark btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal"> Se connecter</button>
                </div>
              </form>
              <div class="pt-2 d-flex text-primary justify-content-between w-100 m-2 mt-3">
                <div><a href="creerprofil5.php">Pas de profil</a> ?</div>
                <div><a href="oublimdp6.php">Mot de passe oublié</a> ?</div>
              </div>
            </div>
          </div>
        </div>
      </div>
              
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-dark text-white btn-outline-danger" data-bs-dismiss="modal">Fermer</button>
      </div>

    </div> ';
        
        $boutons = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $boutons);
        echo $boutons;
                
    }
    if (isset($_POST['page'])){
        /*echo "<script>
                $(document).ready(function() {
                    $('#myModal').modal('show');
                    });
                    </script>";*/
      echo "<div class='container'>
                  <div class='alert alert-danger'>
                      <strong>Erreur</strong> Le mot de passe ou l'identifiant sont invalides.
                  </div>
              <div>
        ";
    } 
    
    echo '</div>
    </header>';
    # echo '<script> $("login-form").submit(function(e) { e.preventDefault(); }); </script>';    # cette ligne est censée empecher le modal de se fermer mais elle ne fonctionne pas
    
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
    $page = "Location: ".$_POST['page'].".php";

    foreach($user as $u){
      #print_r($u);
      if ( (password_verify($_POST['motdepasse'],$u['mdp'])==1) && ( ($_POST['utilisateur']==$u['user']) || ($_POST['utilisateur']==$u['mail']) ) )
      {
          $_SESSION['utilisateur']=$u['user'];
          $_SESSION['role']=$u['role'];
          $_SESSION['msg'] = "vrai";
          echo $page;
          header($page);
     }
    }
  }
    

  function addUser($usr, $mdp, $mail, $role="user",$question=0,$reponse=NULL){
    $user = array();
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);

    $add = array();
    $add['user']=$usr;
    $add['mdp']=password_hash($mdp,PASSWORD_DEFAULT);
    $add['role']=$role;
    $add['mail']=$mail;
    $add['question']=$question;
    if ( True ) { $add['reponse']=$reponse; }
    $user[$add['user']]=$add;

    $fp = fopen("data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function deleteUser($usr){
    $json = file_get_contents('data/users2.json');
    $user = json_decode($json, true);

    unset($user[$usr]);

    $fp = fopen("data/users2.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users2.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

?>

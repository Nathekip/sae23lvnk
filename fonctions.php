<?php

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
    $add['pp']=False;
    $add['reponse']=$reponse;
    $user[$add['user']]=$add;

    $fp = fopen("data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function setup() {
    session_start();
    echo '<meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="shortcut icon" href="assets/images/icone.png">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <body class="bg-warning bg-opacity-25"></body>
        ';
    
    $listetitre = ["Page d'accueil","Formulaire","Informations","Panier","Création de Profil","Mot de passe oublié","Mon Profil"];
    $rep = $listetitre[intval(substr(basename($_SERVER["SCRIPT_NAME"], ".php"), -1))-1];
    if ($rep == NULL){
    $rep = "Car Fusion";}
    echo "<title>$rep</title>";
    if ( isset($_SESSION['utilisateur']) ){
        $json = file_get_contents('data/users.json');
        $user = json_decode($json, true);
        if ( $user[$_SESSION['utilisateur']]['pp'] ){
	        $_SESSION['pp'] = True;
        }    
    }
}

function pr() {
    echo '<pre> Session :<br>';
    print_r($_SESSION);
    echo '<br> Post :<br>';
    print_r($_POST);
    echo '</pre>';
}

function pagenavbar($page=""){
	
  $json = file_get_contents('data/users.json');
  $user = json_decode($json, true);
  $pagehead = "Location: ".$_POST['page'].".php";
  foreach($user as $u){
    #print_r($u);
    if ( (password_verify($_POST['motdepasse'],$u['mdp'])==1) && ( ($_POST['utilisateur']==$u['user']) || ($_POST['utilisateur']==$u['mail']) ) ){
      $_SESSION['utilisateur']=$u['user'];
      $_SESSION['role']=$u['role'];
      $_SESSION['msg'] = "vrai";
      $_SESSION['pp']=$u['pp'];
      #echo $pagehead;
      header($pagehead);
    }
  }
	
  #fixed-top
  $navbar = '<nav class="navbar navbar-expand-lg bg-black navbar-dark">
	       <div class="container">
	         <a class="navbar-brand" href="page01.php"><img src="images/Logo.png" alt="Logo CarFusion"></a>
	         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	           <span class="navbar-toggler-icon"></span>
	         </button>
	         <div class="collapse navbar-collapse" id="navbarNav">
	       	   <ul class="navbar-nav ms-auto">
	       	     <li class="nav-item">
	       	       <a class="nav-link p02" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trouver une voiture" href="page02.php"><i class="fa fa-car fa-2x"></i></a>
	       	     </li>
	       	     <li class="nav-item">
	       	       <a class="nav-link p03" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mon Panier" href="page03.php"><i class="fa-solid fa-shopping-cart fa-2x"></i></a>
	       	     </li>';
	 
  if ( $_SESSION['pp'] ){
	  $navbar .= '<li class="nav-item">
	       	       <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User" href="Monprofil7.php"><img class="border border-2 border-white rounded-circle circle border" width="36" height="36" src="pp/User.jpeg" alt="PP Kono"></i></a>
		     </li>';
	  $navbar = str_replace("User", $_SESSION['utilisateur'], $navbar);
  }
  else if ( isset($_SESSION['utilisateur']) ){
	  $navbar .= '<li class="nav-item">
	       	       <a class="nav-link p07" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User" href="Monprofil7.php"><i class="fa-solid fa-circle-user fa-2x"></i></a>
		     </li>';
	  $navbar = str_replace("User", $_SESSION['utilisateur'], $navbar);
  }
  else {
	  $navbar .= '<li class="nav-item">
	       	       <a class="nav-link disabled" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Vous n\'avez pas de compte" href="Monprofil7.php"><i class="fa-solid fa-circle-user fa-2x"></i></a>
		     </li>';
  }
  $navbar = str_replace($page, 'active', $navbar);
  echo $navbar;
  if( isset($_SESSION['utilisateur']) ){
        $btndeco = '<li class="nav-item">
                      <form action="deconnexion.php" method="post">
	                <button type="submit" name="page" value=NUMERODEPAGE class="btn btn-outline-custom">Se déconnecter</button>
	              </form>
	       	    </li>';
        $btndeco = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $btndeco);
        echo $btndeco;
    }
  else {
	$boutons = '<li class="nav-item">
	              <button type="button" class="btn btn-outline-custom" data-bs-toggle="modal" data-bs-target="#myModal">
		        Connexion
		      </button>
		    </li>
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
			</div>';
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
              <div>";
    } 
    echo "</div>";
	
    # echo '<script> $("login-form").submit(function(e) { e.preventDefault(); }); </script>';    # cette ligne est censée empecher le modal de se fermer mais elle ne fonctionne pas
    
    
    echo            '</div>
                   </ul>
	       	 </div>
	       </div>
    	     </nav>';
  
  /* echo '<script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        </script>'; */
        
  echo '<style>
          .btn:hover, .btn:focus {
              color: #c1c5c7;
              background-color: transparent;
              border-color: #c1c5c7;
          } 
          /* Choix couleur du bouton connexion */
          .btn-outline-custom {
              color: #889496; /* Couleur du texte */
              border-color: #889496; /* Couleur de la bordure */
          }
        </style>';
}
    

  

function deleteUser($usr){
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);

    unset($user[$usr]);

    $fp = fopen("data/users2.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function ppTrue($usr){
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
	
    echo "<pre><br>";
    echo $user[$usr]['pp']=True;
    $user[$usr]['pp']=True;
    echo $user[$usr]['pp']=True;
    echo "<br>";
    print_r($user);		
    echo "</pre>";

    $fp = fopen("data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function pagefooter(){
    echo '<footer>
            <div>
                <div class="jumbotron jumbotron-sm bg-dark small text-white text-opacity-50 w-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget"><br>
                                    <h5 class="widget-title fw-bold">Contact</h5><p></p>
                                    <p>+33 233 455 251<br>
                                        contact-us@carfusion.com<br><p></p>
                                        40 Rue de la Croix Desilles, 35400 Saint-Malo
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget offset-md-3"><br>
                                    <h5 class="widget-title fw-bold">Follow us</h5><p></p>
                                    <p class="follow-me-icons">
                                        <i class="fa-brands fa-instagram"></i>
                                        <i class="fa-brands fa-twitter"></i>
                                        <i class="fa-brands fa-facebook"></i>
                                        <i class="fa-brands fa-github"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-black text-center small text-white text-opacity-50">
                <a>Copyright &copy; Politique de Confidentialité, Terme et Conditions, 2023 CarFusion.</a> 
                </div>
            </div>
        </footer>';
}

?>

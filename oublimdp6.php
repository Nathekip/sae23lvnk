<!DOCTYPE html>
<html>
  <head>
      <?php
          include('fonctions.php');
          setup();
      ?>
    <meta charset="UTF-8">
  </head>
  <body>
    <a href="page01.php" class="btn btn-link"><-- Retour vers la page d'accueil</a>
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center
          min-vh-100 g-0">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm border-warning">
            <div class="card-body">
              <div class="mb-4">
                <?php
                $json = file_get_contents('data/users.json');
                $user = json_decode($json, true);
      
                # set var base
                if ( !isset($_SESSION['MdpBool']) ){
                  $_SESSION['MdpBool'] = False;
                }
                if ( !isset($_SESSION['CmdpBool']) ){
                  $_SESSION['CmdpBool'] = False;
                }
      
      
                if ( isset($_POST['RtrMail']) ){
                  $_SESSION['PhaseMdp'] = False;
                  $_SESSION['usermodif'] = "";
                }
      
                # phase email - Test
                else if ( ( $_POST['mail'] == "" ) && isset($_POST['mail']) ){
                  $alerte = "<div class='alert alert-warning'>
                          Veuillez renseigner votre adresse mail.
                        </div>";
                }
                else if ( ( empty( array_filter($user, function($u) use ($recherche) { return $u['mail'] === $_POST['mail']; })))  && isset($_POST['mail'])) {
                 $alerte = "<div class='alert alert-warning'>
                          Cette adresse mail n'est pas liée à un compte.
                        </div>";
                }
                else if (isset($_POST['mail']) ){
                  $alerte = "";
                  $_SESSION['PhaseMdp'] = True;
                  $_SESSION['usermodif'] = array_values(array_filter($user, function($u) use ($recherche) { return $u['mail'] === $_POST['mail']; }))[0] ;
                }
      
                # affichage formulaire(phase)
                if ($_SESSION['PhaseMdp']) {
                  $formulaire = '
                      <form method="post" action="oublimdp6.php">
                        <button type="submit" name="RtrMail" class="btn btn-link">
                          <-- Revenir en arrière
                        </button>
                      </form>
                      <h5>Mot de passe oublié ?</h5>
                      <p class="text-black-50 pt-2">Entrez un nouveau mot de passe afin de changer votre ancien mot de passe
                      </p>
                    </div>
                    <form action="oublimdp6.php" method="post">
                    Votre nouveau mot de passe
                    <div class="pt-1 mb-3 input-group">
                      <input type="password" id="mdp" value="PhrMdp" class="form-control" name="mdp" placeholder="Entrez votre nouveau mdp">
                      <button type="submit" class="btn btn-warning" name="mdpoeil" value=True>
                        <i class="fa-solid fa-eye"></i>
                      </button>                      
                    </div>
                    Confirmez votre nouveau mot de passe
                    <div class="pt-1 mb-3 input-group">
                      <input type="password" id="cmdp" class="form-control" name="cmdp" placeholder="Confirmez votre mdp">
                      <button type="submit" class="btn btn-warning" name="cmdpoeil" value=True>
                        <img src="images/ShPwd.png" alt="Show Password">
                      </button>
                    </div>
                    <div class="pt-2 mb-3 d-grid">
                      <i class="fa-solid fa-eye"></i>
                        Réinitialiser le mot de passe
                      </button>
                    </div>
                  </form>';
                       }
                else {
                  $formulaire = '
                        <h5>Mot de passe oublié ?</h5>
                        <p class="text-black-50 pt-2">Entrez votre adresse mail afin de vous identifier
                        </p>
                      </div>
                      <form action="oublimdp6.php" method="post">
                        <div class="mb-3">
                          <label for="email" class="form-label">Votre adresse mail</label>
                          <input type="input" id="email" class="form-control" name="mail" placeholder="Entrez votre email">
                        </div>
                        <div class="mb-3 d-grid">
                          <button type="submit" class="btn btn-warning">
                            Confirmer l\'adresse mail
                          </button>
                        </div>
                      </form>';
                        }      
                # test oeil
                if ( isset($_POST['mdpoeil']) ){
                  echo "mdp";
                  $_SESSION['MdpBool'] = ! $_SESSION['MdpBool'];
                  echo $_SESSION['MdpBool'];
                }
                if ( isset($_POST['cmdpoeil']) ){
                  echo "cmdp";
                  $_SESSION['CmdpBool'] = ! $_SESSION['CmdpBool'];
                  echo $_SESSION['CmdpBool'];
                }
                /*if ($_SESSION['MdpBool']){ $formulaire = str_replace("mdpoeil","input",$formulaire);}
                else { $formulaire = str_replace("mdpoeil","password",$formulaire);}
                if ($_SESSION['CmdpBool']){ $formulaire = str_replace("cmdpoeil","input",$formulaire);}
                else { $formulaire = str_replace("mdpoeil","password",$formulaire);}*/
      
                # phase mdp - Test
                if (  ( ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) ) ) && isset($_POST['envoi']) )      {                
                    $alerte = "<div class='alert alert-warning'>
                            <strong>Erreur</strong> Mot de passe non conforme (Au moins 8 charactères, 1 charactère spécial, 1 majuscule).
                          </div>";                    
                }              
                else if (( $_POST['mdp']!=$_POST['cmdp'] ) && isset($_POST['envoi']) ){
                    $alerte = "<div class='alert alert-warning'>
                            <strong>Erreur</strong> Les deux mots de passe tapés ne correspondent pas.
                           </div>";
                    $formulaire = str_replace("PhrMdp",$_POST['mdp'],$formulaire);
                }
                else if ( isset($_POST['envoi']) ){
                    deleteUser($_SESSION['usermodif']['user']);
                    addUser($_SESSION['usermodif']['user'],$_POST['mdp'],$_SESSION['usermodif']['mail'],$_SESSION['usermodif']['role']);                    
                    $alerte = "<div class='alert alert-success'>
                            <strong>Succès</strong> Le mot de passe a bien été modifié.
                           </div>";
                    $_SESSION['PhaseMdp'] = "";
                    $_SESSION['usermodif'] = "";
                    $formulaire = '
                    <h5>Mot de passe oublié ?</h5>
                    <p class="text-black-50 pt-2">Vous pouvez vous connecter à présent
                        </p>
                      </div>
                      <div class="mb-3 mx-5 py-4 d-grid">
                        <a href="page01.php" class="btn text-white btn-outline-warning btn-dark">
                            Se connecter
                          </a>                        
                      </div>
                      ';
                }
                $formulaire = str_replace("PhrMdp",'',$formulaire);
                echo $formulaire;
                ?>
                <span class="align-items-center justify-content-center" >Pas de profil ? <a href="creerprofil5.php">S'inscrire</a></span>
              </form>
            </div>
          </div>
          <div class="pt-2">
            <?php
              echo $alerte;
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php
      print_r($_SESSION['usermodif']);
      echo "<br> Role : ";
      echo $_SESSION['usermodif']['role'];
      pr();
    ?>
  </body>
</html>

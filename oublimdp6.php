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
                  $_SESSION['MdpBool'] = False;
                  $_SESSION['CmdpBool'] = False;
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
                      <input type="PhrOeilMdp" id="mdp" value="PhrMdp" class="form-control" name="mdp" placeholder="Entrez votre nouveau mdp">
                      <button type="submit" class="btn btn-warning" name="mdpoeil" value=True>
                        LogoOeilMdp
                      </button>                      
                    </div>
                    Confirmez votre nouveau mot de passe
                    <div class="pt-1 mb-3 input-group">
                      <input type="PhrOeilCmdp" id="cmdp" value="PhrCmdp" class="form-control" name="cmdp" placeholder="Confirmez votre mdp">
                      <button type="submit" class="btn btn-warning" name="cmdpoeil" value=True>
                        LogoOeilCmdp
                      </button>
                    </div>
                    <div class="pt-2 mb-3 d-grid">
                      <button type="submit" name="envoi" class="mx-4 btn btn-dark btn-outline-warning text-white">  
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
                if ( isset($_POST['mdpoeil']) ){ $_SESSION['MdpBool'] = ! $_SESSION['MdpBool']; }
                if ( isset($_POST['cmdpoeil']) ){ $_SESSION['CmdpBool'] = ! $_SESSION['CmdpBool']; }
                if ($_SESSION['MdpBool']){
                  $formulaire = str_replace("PhrOeilMdp","input",$formulaire);
                  $formulaire = str_replace("LogoOeilMdp",'<i class="fa-solid fa-eye-slash"></i>',$formulaire); 
                }
                else { 
                  $formulaire = str_replace("PhrOeilMdp","password",$formulaire); 
                  $formulaire = str_replace("LogoOeilMdp",'<i class="fa-solid fa-eye"></i>',$formulaire); 
                }
                if ($_SESSION['CmdpBool']){ 
                  $formulaire = str_replace("PhrOeilCmdp","input",$formulaire); 
                  $formulaire = str_replace("LogoOeilCmdp",'<i class="fa-solid fa-eye-slash"></i>',$formulaire); 
                }
                else { 
                  $formulaire = str_replace("PhrOeilCmdp","password",$formulaire); 
                  $formulaire = str_replace("LogoOeilCmdp",'<i class="fa-solid fa-eye"></i>',$formulaire); 
                }
      
                # préremplissage oeil
                if ( $_POST['mdpoeil'] || $_POST['cmdpoeil'] ){
                  $formulaire = str_replace("PhrMdp",$_POST['mdp'],$formulaire);
                  $formulaire = str_replace("PhrCmdp",$_POST['cmdp'],$formulaire);
                }
      
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
                    $_SESSION['MdpBool'] = False;
                    $_SESSION['CmdpBool'] = False;
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
                $formulaire = str_replace("PhrCmdp",'',$formulaire);
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

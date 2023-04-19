<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();


    echo '<header>
        <div class="container-fluid bg-info text-center py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center mx-auto">
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
            $boutons_old = 'Vous n\'êtes pas connectés
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                Connexion
              </button>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Connexion (jaimerais que ce texte soit centré svp)</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body text-center">
                             <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center mx-auto">
                                <div class="login-form">
                                  <form action="NUMERODEPAGE.php" method="post">
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
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
               </div>';
          
          $boutons = 'Vous n\'êtes pas connectés
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                Connexion
              </button>
            </div>
            <div class="modal fade" id="StudentModal" tabindex="-1" role="dialog" aria-labelledby="StudentModalLabel" aria-hidden="true" data-backdrop="static">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <form action="~/GetStudent" class="form-horizontal" role="form" method="post" id="frmStudent">
                        <div class="modal-footer">
                           <div class="pull-right">
                              <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>            
          
          
          
          
          
          
          
          
          

            $boutons = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $boutons);
            echo $boutons;

        }
        echo '</div>
        </header>';
    
        if (isset($_POST)){
        $json = file_get_contents('data/users.json');
        $user = json_decode($json, true);
        $_SESSION['msg'] = False;
        $page = "Location: ".$_POST['page'].".php";
        echo $page;

        foreach($user as $u){
        if ((password_verify($_POST['motdepasse'],$u['mdp'])==1) && ($_POST['utilisateur']==$u['user']))
        {
            $_SESSION['utilisateur']=$_POST['utilisateur'];
            $_SESSION['role']=$u['role'];
            $_SESSION['msg'] = True;
        }
        }
        # header($page);
        }
    
    
    ?>
  </body>
</html>

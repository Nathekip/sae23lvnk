<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    if(isset($_SESSION['utilisateur'])){
      $btndeco = '<form action="deconnexion.php" method="post">
      <button type="submit" name="page" value=NUMERODEPAGE class="btn btn-warning btn-sm">Se déconnecter</button>
      </form>';
      $btndeco = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $btndeco);
      echo $btndeco;
        }
     else { 
       echo '<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
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
               </div>';   
       
        $boutons = str_replace('NUMERODEPAGE', basename($_SERVER["SCRIPT_NAME"], ".php"), $boutons);
        echo $boutons;

        }
        echo '</div>
        </header>';
    
        if (isset($_POST))
        {
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
            }
           }
          # header($page);
        }
    
    
    ?>
  </body>
</html>

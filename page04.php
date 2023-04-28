<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    /*pageheader();
    pagenavbar("p04");*/
    $formulaire =  '<form method="post" action="page04.php">
                      <button type="submit" name="RtrMail" class="btn btn-link">
                        <-- Revenir en arrière
                      </button>
                    </form>
                    <h5>Mot de passe oublié ?</h5>
                    <p class="text-black-50 pt-2">Entrez un nouveau mot de passe afin de changer votre ancien mot de passe
                    </p>
                  </div>
                  <form action="page04.php" method="post">
                    Votre nouveau mot de passe
                    <div class="pt-1 mb-3 input-group">
                      <input type="input" id="mdp" value="PhrMdp" class="form-control" name="mdp" placeholder="Entrez votre nouveau mdp">
                      <button type="submit" class="btn btn-warning" name="mdpoeil" value=True>
                        <i class="fa-solid fa-eye"></i>
                      </button>                      
                    </div>
                    Confirmez votre nouveau mot de passe
                    <div class="pt-1 mb-3 input-group">
                      <input type="password" id="cmdp" value="PhrCmdp" class="form-control" name="cmdp" placeholder="Confirmez votre mdp">
                      <button type="submit" class="btn btn-warning" name="cmdpoeil" value=True>
                        <i class="fa-solid fa-eye"></i>
                      </button>
                    </div>
                    <div class="pt-2 mb-3 d-grid">
                      <button type="submit" name="envoi" class="mx-4 btn btn-dark btn-outline-warning text-white">                      
                        Réinitialiser le mot de passe
                      </button>
                    </div>
                  </form>';
    
    if ( $_POST['mdpoeil'] || $_POST['cmdpoeil'] ){
      $formulaire = str_replace("PhrMdp",$_POST['mdp'],$formulaire);
      $formulaire = str_replace("PhrCmdp",$_POST['cmdp'],$formulaire);
    }
    $formulaire = str_replace("PhrMdp","",$formulaire);
    $formulaire = str_replace("PhrCmdp","",$formulaire);
    
    
    ?>
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center min-vh-100 g-0">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm border-warning">
            <div class="card-body">
              <div class="mb-4">
                <?php
                  echo $formulaire;
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      pr();
    ?>
  </body>
</html>

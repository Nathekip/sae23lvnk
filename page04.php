<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pageheader();
    pagenavbar("p04");
    ?>
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center min-vh-100 g-0">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm border-warning">
            <div class="card-body">
              <div class="mb-4">
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
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
                <div class="pt-2 mb-3 d-grid">
                    Réinitialiser le mot de passe
                  </button>
                </div>
              </form>
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

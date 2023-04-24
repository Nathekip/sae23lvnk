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
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center
          min-vh-100 g-0">
        <div class="col-12 col-md-8 col-lg-4 border-top border-3 border-primary">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
                <h5>Mot de passe oublié ?</h5>
                <p class="mb-2">Entrez votre adresse mail afin de recevoir un mail de récupération
                </p>
              </div>
              <form action="oublimdp6.php" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Votre adresse mail</label>
                  <input type="email" id="email" class="form-control" name="email" placeholder="Entrez votre email" required="">
                </div>
                <div class="mb-3 d-grid">
                  <button type="submit" class="btn btn-primary">
                    Reset Password
                  </button>
                </div>
                <span>Pas de profil ? <a href="creerprofil5.php">S'inscrire</a></span>
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

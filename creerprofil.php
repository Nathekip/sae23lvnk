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
     
    <br><br><br>
      <div class="container bg-light h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black">
              <div class="card-body p-md-5">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                        Créer un compte
                        <?php
                            echo "<div class='container'>";
                            # alerte Condition d'utilisation
                            if ((isset($_POST['condu']))==False){
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Veuillez accepter les Conditions d'utilisation.";
                            }
                            # alerte Mot de Passe de confirmation
                            if ($_POST['mdp']!=$_POST['cmdp']){
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Les deux mots de passe tapés ne correspondent pas.";
                            }
                            echo "</div";
                        ?>
                    </p>
              <div>
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      <img src="images/Register.jpg" class="img-fluid rounded" alt="Sample image">
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <form action="creerprofil.php" method="post" class="mx-1 mx-md-4">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="utilisateur">Nom :</label>
                          <input type="text" name="utilisateur" id="utilisateur" class="form-control" />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="mail">Adresse Mail :</label>
                          <input type="email" name="mail" id="mail" class="form-control" />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="mdp">Mot de Passe :</label>
                          <input type="password" name="mdp" id="mdp" class="form-control" />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="cmdp">Répéter votre Mot de Passe :</label>
                          <input type="password" name="cmdp" id="cmdp" class="form-control" />
                        </div>
                      </div>
                      <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" name="condu" type="checkbox" value="" id="condu" />
                        <label class="form-check-label" for="condu">
                          J'accepte les <a href="#!">Conditions d'utilisation</a>
                        </label>
                      </div>
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-dark text-white btn-lg">S'inscrire</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <br><br><br>

    <?php
        pr();
        pagefooter();
    ?>

</body>
</html>

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
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm border-warning">
            <div class="card-body">
              <div class="mb-4">
                <h5>Mot de passe oublié ?</h5>
                <p class="text-black-50 pt-2">Entrez votre adresse mail afin de recevoir un mail de récupération
                </p>
              </div>
              <form action="oublimdp6.php" method="post">
                <?php
                $json = file_get_contents('data/users.json');
                $user = json_decode($json, true);
                if ( ( $_POST['mail'] == "" ) && isset($_POST['mail']) ){
                  $alerte = "<div class='alert alert-warning'>
                          Veuillez renseigner votre adresse mail.
                        </div>";
                }
                # (!empty( array_filter(   $user, function($u) use ($recherche)  { return $u['mail'] === $_POST['mail']; }  ))) )
                else if ( ( empty( array_filter($user, function($u) use ($recherche) { return $u['mail'] === $_POST['mail']; })))  && isset($_POST['mail'])) {
                 $alerte = "<div class='alert alert-warning'>
                          Cette adresse mail n'est pas liée à un compte.
                        </div>";
                }
                else if (isset($_POST['mail']) ){
                  $alerte = "";
                  $PhaseMdp = True;
                }
                if ($PhaseMdp) {
                  echo '<div class="mb-3">
                          <label for="mdp" class="form-label">Votre nouveau mot de passe</label>
                          <input type="password" id="mdp" class="form-control" name="mdp" placeholder="Entrez votre nouveau mot de passe">
                        </div>
                        <div class="mb-3">
                          <label for="cmdp" class="form-label">Confirmez votre nouveau mot de passe</label>
                          <input type="password" id="cmdp" class="form-control" name="mail" placeholder="Confirmez votre nouveau mot de passe">
                        </div>
                        <div class="mb-3 d-grid">
                          <button type="submit" class="btn btn-warning">
                            Réinitialiser le mot de passe
                          </button>
                        </div>';
                       }
                else {
                  echo '<div class="mb-3">
                          <label for="email" class="form-label">Votre adresse mail</label>
                          <input type="input" id="email" class="form-control" name="mail" placeholder="Entrez votre email">
                        </div>
                        <div class="mb-3 d-grid">
                          <button type="submit" class="btn btn-warning">
                            Confirmer l\'adresse mail
                          </button>
                        </div>';
                        }
                # alerte mdp trop court / ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) )
                else if ( ( ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) ) ) && isset($_POST['mdp'])    )      {
                # la fonction strlen(string) renvoie le nombre de charactères d'un string
                    $alerte = "<div class='alert alert-warning'>
                            <strong>Erreur</strong> Mot de passe non conforme (Au moins 8 charactères, 1 charactère spécial, 1 majuscule).
                          </div>";
                    # $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                }
                # alerte Mot de Passe de confirmation / $_POST['mdp']!=$_POST['cmdp']
                else if ( $_POST['mdp']!=$_POST['cmdp'] ){
                    $alerte = "<div class='alert alert-danger'>
                            <strong>Erreur</strong> Les deux mots de passe tapés ne correspondent pas.
                           </div>";
                }
                else if ( isset($_POST['utilisateur']) ){
                    addUser($_POST['utilisateur'], $_POST['mdp'], $_POST['mail']);
                    $alerte = "<div class='alert alert-success'>
                            <strong>Succès</strong> Le compte a bien été créé.
                           </div>";
                }
                
                
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
      pr();
    ?>
  </body>
</html>

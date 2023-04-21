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
                        
                            $json = file_get_contents('data/users.json');
                            $user = json_decode($json, true);
                            /* echo '<br><pre> data/users.json :<br>';
                            print_r($user);
                            echo '</pre>'; */

                        if ( False ) {
                            echo "Vrai";
                        }
                        else {
                            echo "";
                        }

                        
                            echo "<div class='container'>";
                            # alerte Champ vide / in_array("", array_slice($_POST, 0, 4))
                            if ( in_array("", array_slice($_POST, 0, 4)) ){ 
                            # la fonction array_slice(array, offset, length) permet de récupérer seulement les 4 premiers éléments du tableau
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Vous n'avez pas rempli tous les champs.
                                      </div>";
                            } 
                            # alerte Condition d'utilisation / (!isset($_POST['condu'])) && (isset($_POST['utilisateur']))
                            else if ( (!isset($_POST['condu'])) && (isset($_POST['utilisateur'])) ){
                                echo "<div class='alert alert-warning'>
                                        <strong>Erreur</strong> Veuillez accepter les Conditions d'utilisation.
                                      </div>";
                            }
                            # alerte pseudo déjà pris / ( !empty( array_filter(   $user, function($u) use ($recherche)  { return $u['user'] === $_POST['utilisateur']; }  )   )
                            else if ( ( !empty( array_filter(   $user, function($u) use ($recherche)  { return $u['user'] === $_POST['utilisateur']; }  ) )  ) ){
                            # la fonction array.filter filtre un array selon une fonction
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Le pseudo n'est pas disponible.
                                      </div>";
                            }
                            # alerte mail déjà existant / ( !empty( array_filter(   $user, function($u) use ($recherche)  { return $u['mail'] === $_POST['mail']; }  )   )
                            else if ( ( !empty( array_filter(   $user, function($u) use ($recherche)  { return $u['mail'] === $_POST['mail']; }  ) )  ) ){
                            # si le array est empty, cela veut dire qu'aucune adresse mail dans la base de donnée ne correspond à l'adresse mail envoyée par le formulaire
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> L'adresse mail est déjà utilisée.
                                      </div>";
                            }
                            # alerte mdp trop court / ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) )
                            else if ( ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) ) ){
                            # la fonction strlen(string) renvoie le nombre de charactères d'un string
                                echo "<div class='alert alert-warning'>
                                        <strong>Erreur</strong> Mot de passe non conforme (Au moins 8 charactères, 1 charactère spécial, 1 majuscule).
                                      </div>";
                            }
                            # alerte Mot de Passe de confirmation / $_POST['mdp']!=$_POST['cmdp']
                            else if ( $_POST['mdp']!=$_POST['cmdp'] ){
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Les deux mots de passe tapés ne correspondent pas.
                                       </div>";
                            }
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

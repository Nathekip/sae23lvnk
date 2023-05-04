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
                        $formulaire = '
                                    <div>
                                      <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                          <img src="images/Register.jpg" class="img-fluid rounded" alt="Sample image">
                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                          <form action="creerprofil5.php" method="post" class="mx-1 mx-md-4">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-duotone fa-user fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="utilisateur">Nom :</label>
                                                <input value="phrNom" type="text" placeholder="Votre pseudo" name="utilisateur" id="utilisateur" class="form-control" />
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="mail">Adresse Mail :</label>
                                                <input value="phrMail" type="email" placeholder="Votre adresse mail" name="mail" id="mail" class="form-control" />
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="mdp">Mot de Passe :</label>
                                                <input value="phrMdp" type="password" placeholder="Votre mot de passe" name="mdp" id="mdp" class="form-control" />
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="cmdp">Répéter votre Mot de Passe :</label>
                                                <input value="phrCmdp" type="password" placeholder="Répétez votre mot de passe" name="cmdp" id="cmdp" class="form-control" />
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-person-circle-question fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="rep">
                                                   <select class="form-select-sm" id="question" name="question">
                                                      <datalist id="question">
                                                          <option>Quel est le nom de votre premier animal ?</option>
                                                          <option>Dans quelle ville êtes vous né ?</option>
                                                          <option>Quel est le premier concert que vous avez vu ?</option>
                                                      </datalist>
                                                    </select>                                                                                                              
                                                </label>
                                                <input value="phrRep" type="input" placeholder="Réponse à la question" name="rep" id="rep" class="form-control" />
                                              </div>
                                            </div>
                                            <div class="form-check d-flex justify-content-center mb-5">
                                              <input class="form-check-input me-2" name="condu" type="checkbox" value="" id="condu" />
                                              <label class="form-check-label" for="condu">
                                                J\'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">Conditions d\'utilisation</a>
                                              </label>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                              <div class="px-2">
                                                <button type="submit" class="btn btn-outline-primary btn-dark text-white btn-lg">S\'inscrire</button>
                                              </div>
                                              <div class="px-2">
                                                <a href="page01.php" class="btn btn-outline-info btn-dark text-white btn-lg">Se connecter</a>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>  
                                    </div>    
                                        ';
                            $json = file_get_contents('data/users.json');
                            $user = json_decode($json, true);
                            /* echo '<br><pre> data/users.json :<br>';
                            print_r($user);
                            echo '</pre>'; */
                            echo "<div class='container'>";
                            # alerte Champ vide / in_array("", array_slice($_POST, 0, 4))
                            if ( (in_array("", array_slice($_POST, 0, 4)) ) && ( isset($_POST['utilisateur'])  ) ){ 
                            # la fonction array_slice(array, offset, length) permet de récupérer seulement les 4 premiers éléments du tableau
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Vous n'avez pas rempli tous les champs.
                                      </div>";
                                $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                                $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                                $formulaire = str_replace('phrMdp', $_POST['mdp'], $formulaire);
                                $formulaire = str_replace('phrCmdp', $_POST['cmdp'], $formulaire);
                                $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                            } 
                            # alerte Condition d'utilisation / (!isset($_POST['condu'])) && (isset($_POST['utilisateur']))
                            else if (       (!isset($_POST['condu'])) && (isset($_POST['utilisateur']))   ) {
                                echo "<div class='alert alert-warning'>
                                        <strong>Erreur</strong> Veuillez accepter les Conditions d'utilisation.
                                      </div>";
                                $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                                $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                                $formulaire = str_replace('phrMdp', $_POST['mdp'], $formulaire);
                                $formulaire = str_replace('phrCmdp', $_POST['cmdp'], $formulaire);
                                $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                            }
                            # alerte pseudo déjà pris / ( !empty( array_filter(   $user, function($u) use ($recherche)  { return $u['user'] === $_POST['utilisateur']; }  )   )
                            else if (   (!empty( array_filter(   $user, function($u) use ($recherche)  { return $u['user'] === $_POST['utilisateur']; }  )))  ){
                            # la fonction array.filter filtre un array selon une fonction
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Le pseudo n'est pas disponible.
                                      </div>";
                                $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                                $formulaire = str_replace('phrMdp', $_POST['mdp'], $formulaire);
                                $formulaire = str_replace('phrCmdp', $_POST['cmdp'], $formulaire);
                                $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                            }
                            # alerte mail déjà existant / ( !empty( array_filter(   $user, function($u) use ($recherche)  { return $u['mail'] === $_POST['mail']; }  )   )
                            else if (   (!empty( array_filter(   $user, function($u) use ($recherche)  { return $u['mail'] === $_POST['mail']; }  ))) ){
                            # si le array est empty, cela veut dire qu'aucune adresse mail dans la base de donnée ne correspond à l'adresse mail envoyée par le formulaire
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> L'adresse mail est déjà utilisée.
                                      </div>";
                                $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                                $formulaire = str_replace('phrMdp', $_POST['mdp'], $formulaire);
                                $formulaire = str_replace('phrCmdp', $_POST['cmdp'], $formulaire);
                                $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                            }
                            # alerte mdp trop court / ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) )
                            else if ( ( ( strlen( $_POST['mdp'] ) < 8 ) or ( ! preg_match('/[\'^£$%&?*()}{@#~><>,|=_+¬-]/', $_POST['mdp']) ) or ( ! preg_match('/[A-Z]/', $_POST['mdp']) ) ) && isset($_POST['mdp'])    )      {
                            # la fonction strlen(string) renvoie le nombre de charactères d'un string
                                echo "<div class='alert alert-warning'>
                                        <strong>Erreur</strong> Mot de passe non conforme (Au moins 8 charactères, 1 charactère spécial, 1 majuscule).
                                      </div>";
                                $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                                $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                                $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                            }
                            # alerte Mot de Passe de confirmation / $_POST['mdp']!=$_POST['cmdp']
                            else if ( $_POST['mdp']!=$_POST['cmdp'] ){
                                echo "<div class='alert alert-danger'>
                                        <strong>Erreur</strong> Les deux mots de passe tapés ne correspondent pas.
                                       </div>";
                                $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                                $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                                $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                            }
                            else if ( isset($_POST['utilisateur']) ){
                                addUser($_POST['utilisateur'], $_POST['mdp'], $_POST['mail']);
                                echo "<div class='alert alert-success'>
                                        <strong>Succès</strong> Le compte a bien été créé.
                                       </div>";
                            }
                            $formulaire = str_replace('phrNom', '', $formulaire);
                            $formulaire = str_replace('phrMail', '', $formulaire);
                            $formulaire = str_replace('phrMdp', '', $formulaire);
                            $formulaire = str_replace('phrCmdp', '', $formulaire);
                            $formulaire = str_replace('phrRep', '', $formulaire);
                        ?>
                    </p>
                <?php echo $formulaire; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content bg-light">
          <!-- Modal Header -->
          <div class="modal-header text-center">
            <h4 class="modal-title mx-auto">Conditions générales d'utilisation</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <!-- Modal body -->
          <div class="modal-body modal-dialog text-center">
             <div class="container-fluid text-center d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mx-auto">
                     <p>
                        <strong>1. Objet du service</strong><br>
                        Le service de location de voitures en ligne est proposé par [nom de l'entreprise] (ci-après dénommée "loueur"), qui permet aux utilisateurs de réserver des véhicules en ligne pour une location temporaire.
                        <br>
                            <br><strong>2. Acceptation des conditions générales</strong><br>
                        L'utilisation du service de location de voitures en ligne implique l'acceptation pleine et entière des présentes conditions générales d'utilisation.
                        <br>
                            <br><strong>3. Inscription</strong><br>
                        Pour utiliser le service de location de voitures en ligne, l'utilisateur doit s'inscrire sur le site internet de [nom de l'entreprise] et fournir toutes les informations requises.
                        <br>
                            <br><strong>4. Réservation</strong><br>
                        La réservation d'un véhicule peut être effectuée en ligne via le site internet de [nom de l'entreprise]. La disponibilité des véhicules est indiquée en temps réel sur le site.
                        <br>
                            <br><strong>5. Tarifs</strong><br>
                        Les tarifs de location des véhicules sont indiqués sur le site internet de [nom de l'entreprise]. Ils incluent les taxes et assurances obligatoires, mais ne comprennent pas les options supplémentaires éventuelles.
                        <br>
                            <br><strong>6. Paiement</strong><br>
                        Le paiement de la location peut être effectué en ligne via le site internet de [nom de l'entreprise]. Les modalités de paiement sont indiquées sur le site.
                        <br>
                            <br><strong>7. Modification ou annulation de la réservation</strong><br>
                        La modification ou l'annulation d'une réservation peut être effectuée en ligne via le site internet de [nom de l'entreprise]. Les conditions de modification ou d'annulation sont indiquées sur le site.
                        <br>
                            <br><strong>8. Prise en charge et restitution du véhicule</strong><br>
                        Le véhicule peut être pris en charge à l'adresse indiquée lors de la réservation. La restitution doit être effectuée à l'adresse et à la date indiquées lors de la réservation. Tout retard ou toute restitution anticipée doit être signalé au loueur.
                        <br>
                            <br><strong>9. Utilisation du véhicule</strong><br>
                        Le véhicule doit être utilisé conformément à la réglementation en vigueur et aux conditions générales d'utilisation du loueur. L'utilisateur doit veiller à la bonne utilisation du véhicule et à son entretien durant la période de location.
                        <br>
                            <br><strong>10. Responsabilité de l'utilisateur</strong><br>
                        L'utilisateur est responsable du véhicule et de ses occupants durant la période de location. Il doit veiller à la sécurité et à la préservation du véhicule durant toute la période de location.
                        <br>
                            <br><strong>11. Assurance</strong><br>
                        Le véhicule est assuré par le loueur conformément à la réglementation en vigueur. Toutefois, l'utilisateur reste responsable de tout dommage causé au véhicule en cas de non-respect des conditions générales d'utilisation ou de la réglementation en vigueur.
                        <br>
                            <br><strong>12. Réclamation</strong><br>
                        Toute réclamation doit être formulée auprès du loueur dans les meilleurs délais. Le loueur s'engage à étudier toute réclamation dans les meilleurs délais.
                        <br>
                            <br><strong>13. Protection des données personnelles</strong><br>
                        Le loueur s'engage à protéger les données personnelles de l'utilisateur conformément à la réglementation en vigueur. Les données personnelles de l'utilisateur sont utilisées
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
        pr();
        pagefooter();
    ?>
    </body>
</html>

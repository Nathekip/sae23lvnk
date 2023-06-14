<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
            include('fonctions.php');
            setup();
            # set var base
            if ( !isset($_SESSION['MdpBool']) ){ $_SESSION['MdpBool'] = False; }
            if ( !isset($_SESSION['CmdpBool']) ){ $_SESSION['CmdpBool'] = False; }
        ?>
      <meta charset="UTF-8">
    </head>
    <body>
    <br><br><br>
      <div class="container bg-light h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <!-- <div class="col-lg-12 col-xl-11"> -->
            <div class="card text-black">
              <div class="card-body p-md-5">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                        Créer un compte
                        <?php
                        $formulaire = '
                                    <div>
                                      <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 pt-5 order-lg-1">
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
                                              <i class="fas fa-duotone fa-house fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                Département de domicile :
                                                <select class="form-select" name="dep">
                                                  PlaceholderOptionsDep
                                                </select>
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                Mot de Passe :
                                                <div class="input-group">
                                                  <input type="phrOeilMdp" id="mdp" value="phrMdp" class="form-control" name="mdp" placeholder="Entrez votre mot de passe">
                                                  <button type="submit" class="btn btn-secondary btn-outline-info text-white" name="mdpoeil" value=True>
                                                    LogoOeilMdp
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                Confirmez ce mot de Passe :
                                                <div class="input-group">
                                                  <input type="phrOeilCmdp" id="cmdp" value="phrCmdp" class="form-control" name="cmdp" placeholder="Confirmez votre mot de passe">
                                                  <button type="submit" class="btn btn-secondary btn-outline-info text-white" name="cmdpoeil" value=True>
                                                    LogoOeilCmdp
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                              <i class="fas fa-person-circle-question fa-lg me-3 fa-fw"></i>
                                              <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="rep">
                                                   <select class="form-select-sm" id="question" name="question">
                                                      <option value="0">Je ne désire pas de question de validation</option>
                                                      <option value="1">Quel est le nom de votre premier animal ?</option>
                                                      <option value="2">Dans quelle ville êtes vous né ?</option>
                                                      <option value="3">Quel est le premier concert que vous avez vu ?</option>
                                                    </select>  
                                                  </label>
                                                <input value="phrRep" type="input" placeholder="Réponse à la question" name="reponse" id="reponse" class="form-control" />
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
                                                <button type="submit" name="send" class="btn btn-outline-primary btn-dark text-white btn-lg">S\'inscrire</button>
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
                        # remplissage form select departement
                        # liste dep : https://gist.github.com/mlorant/b4d7bb6f96c47776c8082cf7af44ad95
                        $dep = ["00" => "Hors France", "01" => "Ain", "02" => "Aisne", "03" => "Allier", "04" => "Alpes-de-Haute-Provence", "05" => "Hautes-Alpes", "06" => "Alpes-Maritimes", "07" => "Ardèche", "08" => "Ardennes", "09" => "Ariège", "10" => "Aube", "11" => "Aude", "12" => "Aveyron", "13" => "Bouches-du-Rhône", "14" => "Calvados", "15" => "Cantal", "16" => "Charente", "17" => "Charente-Maritime", "18" => "Cher", "19" => "Corrèze", "2A" => "Corse-du-Sud", "2B" => "Haute-Corse", "21" => "Côte-d'Or", "22" => "Côtes-d'Armor", "23" => "Creuse", "24" => "Dordogne", "25" => "Doubs", "26" => "Drôme", "27" => "Eure", "28" => "Eure-et-Loir", "29" => "Finistère", "30" => "Gard", "31" => "Haute-Garonne", "32" => "Gers", "33" => "Gironde", "34" => "Hérault", "35" => "Ille-et-Vilaine", "36" => "Indre", "37" => "Indre-et-Loire", "38" => "Isère", "39" => "Jura", "40" => "Landes", "41" => "Loir-et-Cher", "42" => "Loire", "43" => "Haute-Loire", "44" => "Loire-Atlantique", "45" => "Loiret", "46" => "Lot", "47" => "Lot-et-Garonne", "48" => "Lozère", "49" => "Maine-et-Loire", "50" => "Manche", "51" => "Marne", "52" => "Haute-Marne", "53" => "Mayenne", "54" => "Meurthe-et-Moselle", "55" => "Meuse", "56" => "Morbihan", "57" => "Moselle", "58" => "Nièvre", "59" => "Nord", "60" => "Oise", "61" => "Orne", "62" => "Pas-de-Calais", "63" => "Puy-de-Dôme", "64" => "Pyrénées-Atlantiques", "65" => "Hautes-Pyrénées", "66" => "Pyrénées-Orientales", "67" => "Bas-Rhin", "68" => "Haut-Rhin", "69" => "Rhône", "70" => "Haute-Saône", "71" => "Saône-et-Loire", "72" => "Sarthe", "73" => "Savoie", "74" => "Haute-Savoie", "75" => "Paris", "76" => "Seine-Maritime", "77" => "Seine-et-Marne", "78" => "Yvelines", "79" => "Deux-Sèvres", "80" => "Somme", "81" => "Tarn", "82" => "Tarn-et-Garonne", "83" => "Var", "84" => "Vaucluse", "85" => "Vendée", "86" => "Vienne", "87" => "Haute-Vienne", "88" => "Vosges", "89" => "Yonne", "90" => "Territoire de Belfort", "91" => "Essonne", "92" => "Hauts-de-Seine", "93" => "Seine-Saint-Denis", "94" => "Val-de-Marne", "95" => "Val-d'Oise", "971" => "Guadeloupe", "972" => "Martinique", "973" => "Guyane", "974" => "La Réunion", "976" => "Mayotte"];
                        $OptionsDep = "";
                        foreach($dep as $key=>$value) {
                            $OptionsDep .= "<option value='".$key."'>".$key." - ".$value."</option>";
                        }
                        $formulaire = str_replace("PlaceholderOptionsDep",$OptionsDep,$formulaire); 
                        
                        # test oeil
                        if ( isset($_POST['mdpoeil']) ){ $_SESSION['MdpBool'] = ! $_SESSION['MdpBool']; }
                        if ( isset($_POST['cmdpoeil']) ){ $_SESSION['CmdpBool'] = ! $_SESSION['CmdpBool']; }
                        if ($_SESSION['MdpBool']){
                          $formulaire = str_replace("phrOeilMdp","input",$formulaire);
                          $formulaire = str_replace("LogoOeilMdp",'<i class="fa-solid fa-eye-slash"></i>',$formulaire); 
                        }
                        else { 
                          $formulaire = str_replace("phrOeilMdp","password",$formulaire); 
                          $formulaire = str_replace("LogoOeilMdp",'<i class="fa-solid fa-eye"></i>',$formulaire); 
                        }
                        if ($_SESSION['CmdpBool']){ 
                          $formulaire = str_replace("phrOeilCmdp","input",$formulaire); 
                          $formulaire = str_replace("LogoOeilCmdp",'<i class="fa-solid fa-eye-slash"></i>',$formulaire); 
                        }
                        else { 
                          $formulaire = str_replace("phrOeilCmdp","password",$formulaire); 
                          $formulaire = str_replace("LogoOeilCmdp",'<i class="fa-solid fa-eye"></i>',$formulaire); 
                        }
                        
                        # préremplissage oeil
                        if ( $_POST['mdpoeil'] || $_POST['cmdpoeil'] ){
                          $formulaire = str_replace("phrMdp",$_POST['mdp'],$formulaire);
                          $formulaire = str_replace("phrCmdp",$_POST['cmdp'],$formulaire);
                          $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                          $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                          $formulaire = str_replace('phrRep', $_POST['rep'], $formulaire);
                        }
                           
                        $json = file_get_contents('data/users.json');
                        $user = json_decode($json, true);
                        /* echo '<br><pre> data/users.json :<br>';
                        print_r($user);
                        echo '</pre>'; */
                        echo "<div class='container'>";
                        
                        # alertes
                        if ( isset($_POST['send']) ) {
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
                          # alerte Question Réponse /
                          else if ( ($_POST['question'] != 0) && ($_POST['reponse'] == "") ){
                              echo "<div class='alert alert-danger'>
                                      <strong>Erreur</strong> Vous devez fournir une réponse à la question d'authentification, si vous en voulez une.
                                     </div>";
                              $formulaire = str_replace('phrNom', $_POST['utilisateur'], $formulaire);
                              $formulaire = str_replace('phrMail', $_POST['mail'], $formulaire);
                              $formulaire = str_replace('phrMdp', $_POST['mdp'], $formulaire);
                              $formulaire = str_replace('phrCmdp', $_POST['cmdp'], $formulaire);
                          }
                          else if ( isset($_POST['utilisateur']) ){
                              addUser($_POST['utilisateur'], $_POST['mdp'], $_POST['mail'], $_POST['dep'],"user", $_POST['question'], $_POST['reponse']);
                              echo "<div class='alert alert-success'>
                                      <strong>Succès</strong> Le compte a bien été créé.
                                     </div>";
                          }
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

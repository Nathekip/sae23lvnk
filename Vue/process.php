<?php
session_start();
// Vérifier si des données ont été envoyées via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erreur=False;
    // Effectuer les actions souhaitées avec les données du formulaire
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
    foreach($user as $u){
      #print_r($u);
      if ( isset($_POST['motdepasse']) && isset($_POST['utilisateur']) ){
        if ( (password_verify($_POST['motdepasse'],$u['mdp'])==1) && ( ($_POST['utilisateur']==$u['user']) || ($_POST['utilisateur']==$u['mail'])) ){
          $_SESSION['utilisateur']=$u['user'];
          $_SESSION['role']=$u['role'];
          $_SESSION['msg'] = "vrai";
          $_SESSION['pp']=$u['pp'];
          $_SESSION['page']= $_POST['page'];
          $erreur=True;
          #echo $pagehead;
          #header($pagehead);
        }
      }
    }
    if ( ! $erreur){
    echo "<div class='alert alert-danger'>
    <strong>Erreur</strong> Le mot de passe ou l'identifiant sont invalides.
  </div>";}
}
?>

<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pagenavbar("p04");
    #addUser($_POST['utilisateur'], $_POST['mdp'], $_POST['mail'], $_POST['dep'],"user", $_POST['question'], $_POST['reponse']);
    addUser('utilisateur','mdp', 'mail', 'dep',"user", 'question', 'reponse');
    echo "<pre>";
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
    print_r($user);
    ?>
  </body>
</html>

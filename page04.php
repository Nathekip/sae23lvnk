<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pagenavbar("p04");
    ?>
    <form action="page04.php" method="post">
      <input value="nom" type="text" name="utilisateur" class="form-control"/>
      <input value="adresse@mail.fr" type="text" name="mail" class="form-control"/>
      <input value="bonjour" type="text" name="mdp" class="form-control"/>
      <input value="44" type="text" name="dep" class="form-control"/>
      <input value="2" type="text" name="question" class="form-control"/>
      <input value="Louis" type="text" name="reponse" class="form-control"/>
      <button type="submit" name="send" class="btn btn-outline-primary btn-dark text-white btn-lg">
        S\'inscrire
      </button>
    </form>
    <?php
    addUser($_POST['utilisateur'], $_POST['mdp'], $_POST['mail'], $_POST['dep'],"user", $_POST['question'], $_POST['reponse']);
    echo "<pre>";
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
    print_r($user);
    ?>
  </body>
</html>

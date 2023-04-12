<!DOCTYPE html>
<html>
<head>
    <?php
        include('functions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
<?php

$json = file_get_contents('data/users2.json');
$user = json_decode($json, true);
$connec = true;

foreach($user as $u){
if ((password_verify($_POST['motdepasse'],$u['mdp'])==1) && ($_POST['utilisateur']==$u['user']))
{
    $_SESSION['utilisateur']=$_POST['utilisateur'];
    $_SESSION['role']=$u['role'];
    header('Location: page01.php');
    $connec = false;
}
}
if ($connec){
    
    echo "<a href='connexion.php'><img class='rounded mx-auto d-block' centered' src='images/error.png' alt='erreur'></a>";
}
?>
</body>
</html>



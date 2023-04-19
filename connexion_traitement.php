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
<?php

$json = file_get_contents('data/users.json');
$user = json_decode($json, true);
$connec = true;

foreach($user as $u){
if ((password_verify($_POST['motdepasse'],$u['mdp'])==1) && ($_POST['utilisateur']==$u['user']))
{
    $_SESSION['utilisateur']=$_POST['utilisateur'];
    $_SESSION['role']=$u['role'];
    header('Location: page01.php');
}
}
echo "a";
}
?>
</body>
</html>



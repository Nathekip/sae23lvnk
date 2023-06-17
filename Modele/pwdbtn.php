<?php
session_start();
include('../Vue/fonctions.php');

$keys = array_keys($_POST);
$usr = $keys[2];
echo $usr;
echo "<pre>";
if (($_POST['mdp']=$_POST['cmdp'])&&($_SESSION['role']=='admin'))
{
    $json = file_get_contents('data/users.json');
    $user = json_decode($json, true);
    $user[$usr]['mdp']=password_hash($_POST['mdp'],PASSWORD_DEFAULT);
    

    $fp = fopen("../data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("../data/users.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);

}

header('Location: ../Controleur/gestionuser04.php');
?>

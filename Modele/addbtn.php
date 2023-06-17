<?php
session_start();
include('../Vue/fonctions.php');
if ($_POST['mdp']==$_POST['cmdp']){
    addUser($_POST['pseudo'],$_POST['mdp'],$_POST['role']);
}

header('Location: ../Controleur/gestionuser04.php');
?>

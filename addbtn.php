<?php
session_start();
include('functions.php');
if ($_POST['mdp']==$_POST['cmdp']){
    addUser($_POST['pseudo'],$_POST['mdp'],$_POST['role']);
}

header('Location: page06.php');
?>
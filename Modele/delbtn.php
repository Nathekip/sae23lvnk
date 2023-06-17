<?php
session_start();
include('../Modele/users.php');
include('../Vue/fonctions.php');
echo "<pre>";
print_r($_SESSION);
if ($_SESSION['role']=='admin'){
deleteUser(key($_POST));
}
header('Location: ../Controleur/gestionuser04.php');
?>

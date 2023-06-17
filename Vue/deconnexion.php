<?php
include('../Vue/fonctions.php');
setup();
session_unset();
$page = "Location: ../Controleur/accueil01.php";
header($page);
?>

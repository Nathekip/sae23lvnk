<?php
include('../Vue/fonctions.php');
setup();
session_unset();
$page = "Location: /Controleur/".$_POST['page'].".php";
header($page);
?>

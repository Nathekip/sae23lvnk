<?php
include('../Vue/fonctions.php');
setup();
session_unset();
$page = "Location: /sae23lvnk-main/Controleur/".$_POST['page'].".php";
header($page);
?>

<?php
include('../Vue/fonctions.php');
setup();
session_unset();
$page = "Location: /sae23lvnk/Controleur/".$_POST['page'].".php";
header($page);
?>

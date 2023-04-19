<?php
include('fonctions.php');
setup();
session_unset();
$page = "Location: ".$_POST['page'].".php";
header($page);
?>



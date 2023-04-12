<?php
session_start();
include('functions.php');
findUser($_POST['pseudo']);
header('Location: page06.php');
?>
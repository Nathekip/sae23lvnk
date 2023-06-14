<?php
session_start();
include('Vue/fonctions.php');
echo "<pre>";
print_r($_SESSION);
if ($_SESSION['role']=='admin'){
deleteUser(key($_POST));
}
header('Location: page06.php');
?>
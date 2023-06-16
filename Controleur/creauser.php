<?php
include('../Modele/users.php');

newUsers();
echo "<pre>";
$user = readUser();
print_r($user);
?>

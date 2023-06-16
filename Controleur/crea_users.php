<?php
include('../Modele/users.php');

newUsers();
echo "<pre>";
$user = readUsers();
print_r($user);
?>

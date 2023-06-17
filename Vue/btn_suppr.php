<?php
// Récupérer le paramètre de la requête
$parametre = explode(",",$_POST['parametre']);

// Inclure le fichier contenant la fonction à appeler
include('../Modele/files.php');

// Appeler la fonction avec le paramètre
deleteFile($parametre);
?>

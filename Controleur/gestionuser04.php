<!DOCTYPE html>
<html>
<head>
    <?php
        include('../Vue/fonctions.php');
        setup();
        if ($_SESSION['role'] !==  "admin") {
            header('Location: ../Controleur/accueil01.php');
        }
        /*if ( !isset($_SESSION['utilisateur'])){
            header("Location: ../Controleur/accueil01.php");
        }*/
    ?>
  <meta charset="UTF-8">
</head>
<body>
        <?php pagenavbar("p04"); ?>

        <h3 class="mb-0 flex-fill text-center">Liste des utilisateurs :</h3><br>
      
        <?php 
        $jsonString = file_get_contents('../data/users.json');

        // Convertir le contenu JSON en tableau associatif
        $users = json_decode($jsonString, true);
        echo showusers($users);
         ?>
        <h3 class="mb-0 flex-fill text-center">Ajouter un utilisateur :</h3><br>
        
        <form method="post">
        <input type="hidden" name="action" value="addUser">        
        <table class="table table-info table-striped">
            <td class="align-middle"><input type="input" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo" required></td>
            <td class="align-middle"><input type="password" class="form-control" id="mdp" placeholder="mot de passe" name="mdp" required></td>
            <td class="align-middle"><input type="password" class="form-control" id="cmdp" placeholder="confirmer le mot de passe" name="cmdp" required></td>
            <td class="align-middle"><input type="email" class="form-control" id="email" placeholder="email" name="email" required></td>
            <td class="align-middle"><input type="text" class="form-control" id="nom" placeholder="nom" name="nom" required></td>
            <td class="align-middle"><input type="text" class="form-control" id="departement" placeholder="département" name="departement" required></td>
            <td class="align-middle">
                <select class="form-select" name="role" required>
                    <option selected disabled>Choisir un rôle</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="visitor">Visiteur</option>
                    <option value="visitor">Employe</option>
                    <option value="visitor">Communication</option>
                </select>
            </td>
            <td class="align-middle">
                <button type="submit" class="btn btn-white">
                    <i class="fa-solid fa-user-plus"></i>
                </button>
            </td>
    </table>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'addUser') {
        addUser($_POST['pseudo'], $_POST['nom'], $_POST['mdp'], $_POST['email'], $_POST['departement'], $_POST['role']);
    }
}
if (isset($_POST['tcheck']) && isset($_POST['user'])) {
    $usr = $_POST['user'];
    $role = $_POST['role'];
    $mdp = $_POST['mdp'];
    modUser($usr, $role, $mdp);
}

?>

        <?php
        pagefooter();
    ?>
</body>
</html>

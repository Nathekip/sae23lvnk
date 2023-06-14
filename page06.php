<!DOCTYPE html>
<html>
<head>
    <?php
        include('Vue/fonctions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
        <?php pagenavbar("p04"); ?>

        <h3 class="mb-0 flex-fill text-center">Liste des utilisateurs :</h3><br>
      
        <?php 
        $jsonString = file_get_contents('data/users.json');

        // Convertir le contenu JSON en tableau associatif
        $users = json_decode($jsonString, true);
        echo showusers($users);
         ?>
        <h3 class="mb-0 flex-fill text-center">Ajouter un utilisateur :</h3><br>
        
        <form  method="post">
        <table class="table table-info table-striped">
        <td class="align-middle"><input type="input" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo"></td>
        <td class="align-middle"><input type="password" class="form-control" id="mdp" placeholder="mot de passe" name="mdp"></td>
        <td class="align-middle"><input type="password" class="form-control" id="cmdp" placeholder="confirmer le mot de passe" name="cmdp"></td>
        <td class="align-middle">
            <select class="form-select" name="role">
                <option selected disabled>Choisir un rôle</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="visitor">Visitor</option>
            </select>
        </td>
        <td class="align-middle">
            <button type="submit" onclick="addbtn.php" class="btn btn-white">
                <img class='rounded' src='images/adduser.png' alt='logo'>
            </button>
        </td>
        </table>
        </form>



        <?php
        pagefooter();
    ?>
</body>
</html>

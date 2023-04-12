<!DOCTYPE html>
<html>
<head>
    <?php
        include('functions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
    <?php
        pageheader();
        echo pagenavbar("p06");
        ?>
        <br>
        <div class="container-fluid text-center py-3 d-flex justify-content-center align-items-center flex-column">
        <h3 class="mb-0 flex-fill text-center">Chercher un utilisateur :</h3><br>
        
        <form action="page06.php" method="post">
        <table class="table table-secondary table-striped">
        <td class="align-middle"><input type="input" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo"></td>
        <td class="align-middle">
            <button type="submit" class="btn btn-white">
                <img class='rounded' src='images/finduser.png' alt='logo'>
            </button>
        </td>
        </table>
        </form>



        <h3 class="mb-0 flex-fill text-center">Liste des utilisateurs :</h3><br>

        <?php 
        if((isset($_POST['pseudo']))&&($_POST['pseudo']!="")){
            findUser($_POST['pseudo']);
            $json = file_get_contents('data/finduser.json');
            $user = json_decode($json, true);
        }
        else {
            $json = file_get_contents('data/users2.json');
            $user = json_decode($json, true);
        }
       


        echo showusers($user);
         ?>
        <h3 class="mb-0 flex-fill text-center">Ajouter un utilisateur :</h3><br>
        
        <form action="addbtn.php" method="post">
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
            <button type="submit" class="btn btn-white">
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

<!DOCTYPE html>
<html>
  <body>
    <?php
      include('../Vue/fonctions.php');
      setup();
      pagenavbar("p07");
      if (!isset($_SESSION['utilisateur'])) {
        header('Location: 172.18.50.11/sae23lvnk-main/Controleur/accueil01.php');
        exit();
      }
      $uploadOk = 1;
      $name = $_SESSION['utilisateur'];
      $role = $_SESSION['role'];
      $btn = <<<EOD
        <label class="custom-file-upload">
          <input type="file" name="Upload">
          <a class="btn btn-warning"> 
            <i class="fa fa-cloud-upload"></i>
            Changer de photo de profil
          </a>
        </label>
      EOD;
      $btn2 = <<<EOD
        <input class="btn btn-warning" type="submit" value="Valider" name="submit">
      EOD;
      $btn3 = <<<EOD
        <form class="pt-3" action="monprofil07.php" method="post">
          <input class="btn btn-danger text-white btn-outline-dark" type="submit" value="Supprimer la photo de profil" name="remove">
        </form>
      EOD;
      $nomcomplet = getNom($_SESSION['utilisateur']);
      try {
        $image_PP = explode(" ", $nomcomplet)[0][0] . explode(" ", $nomcomplet)[1][0];
      } catch (Exception $e) {
        $image_PP = 'PP';
      }
      
      $alerte = '';

      $target_dir = "../images/pp/";

      if (isset($_POST['submit'])) {
        $target_file = $target_dir . $name . ".jpeg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["Upload"]["tmp_name"]);
          if ($check === false) {
            $alerte = <<<EOD
              <div class='alert alert-danger'>
                <strong>Erreur</strong> Le fichier n'est pas une image
              </div>
            EOD;
            $uploadOk = 0;
          }
        }

        if ($_FILES["Upload"]["size"] > 500000) {
          $alerte = <<<EOD
            <div class='alert alert-danger'>
              <strong>Erreur</strong> Le fichier est trop volumineux
            </div>
          EOD;
          $uploadOk = 0;
        }

        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
          $alerte = <<<EOD
            <div class='alert alert-danger'>
              <strong>Erreur</strong> Seuls les formats JPG, JPEG, PNG et GIF sont autorisés
            </div>
          EOD;
          $uploadOk = 0;
        }

        if ($uploadOk == 1) {
          if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
            $nomfichier = htmlspecialchars(basename($_FILES["Upload"]["name"]));
            $alerte = <<<EOD
              <div class='alert alert-success'>
                <strong>Succès</strong> $nomfichier est maintenant votre photo de profil !
              </div>
            EOD;
            ppTrue($name);
            $_SESSION['pp'] = True;
            header('Location: monprofil07.php');
            exit();
          }
        }
      }

      if (isset($_POST['remove'])) {
        ppfalse($name);
        $fichier = $target_dir . $name . ".jpeg";
        unlink($fichier);
        $_SESSION['pp'] = False;
        header('Location: monprofil07.php');
        exit();
      }
    ?>

    <style>
      input[type="file"] {
        display: none;
      }
    </style>

    <div class="container-fluid text-center py-3">
      <?php
        echo $alerte;
      ?>
    </div>

    <?php
      $card = <<<EOD
        <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center mx-auto">
            <div class="card" style="width:400px">
              <img class="card-img-top" src="../images/pp/$name.jpeg" alt="Card image" style="width:100%" onerror="this.src='https://via.placeholder.com/400x400.png?text=$image_PP'">
              <div class="card-body">
                <h4 class="card-title">$nomcomplet</h4>
                <p class="card-text">Votre rôle est $role</p>
                <form action="monprofil07.php" method="post" enctype="multipart/form-data">
                  $btn
                  $btn2
                </form>
                $btn3
              </div>
            </div>
          </div>
        </div>
      EOD;

      echo $card;
    ?>
  </body>
</html>

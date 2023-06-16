<!DOCTYPE html>
<html>
  <body>
    <?php
      include('../Vue/fonctions.php');
      setup();
      pagenavbar("p07");
    
      $a = ! isset($_SESSION['utilisateur']);
      echo $a;
      if ( ! isset($_SESSION['utilisateur']) ){
        echo "a";
        header('Location: 172.18.50.11/sae23lvnk/Controleur/accueil01.php');
        #header('Location: sae23/Controleur/page01.php');
      }
    ?>
    <!-- <form action="monprofil07.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form> -->
    
    
    <?php
      # <a href="#" class="btn btn-warning">Changer de photo de profil</a>         fileToUpload
      $name = $_SESSION['utilisateur'];
      $role = $_SESSION['role'];
      $btn = <<<EOD
                   <label class="custom-file-upload">
                     <input type="file" name="Upload">
                       <a class="btn btn-warning"> 
                         <i class="fa fa-cloud-upload"></i>
                         Changer de photo de profil
                       </a>
                     </input>
                   </label>
      EOD;
      $btn2 = <<<EOD
                   <input class="btn btn-warning" type="submit" value="Valider" name="submit">
      EOD;
      $image_PP = 'PP';
      $card = <<<EOD
      <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center mx-auto">
          <div class="card" style="width:400px">
            <img class="card-img-top" src="pp/$name.jpeg" alt="Card image" style="width:100%" onerror="this.src='https://via.placeholder.com/400x400.png?text=$image_PP'">
            <div class="card-body">
              <h4 class="card-title">$name</h4>
              <p class="card-text">Votre rôle est $role</p>
              <form action="monprofil07.php" method="post" enctype="multipart/form-data">
                $btn
                $btn2
              </form>
            </div>
          </div>
        </div>
      </div>
      EOD;
      #$card = str_replace("",$_SESSION,$card);
      echo $card;
      ?>
      <style>
        input[type="file"] {
            display: none;
        }
      </style>
    
      <?php
      # Procédure d'enregistrement de l'image 
      $target_dir = "pp/";
      #$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $target_file = $target_dir . $name . ".jpeg";
      echo $target_file;
      echo "<br>";
      echo basename($_FILES["Upload"]["name"]);
      echo "<br>";
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      echo $imageFileType;
      echo "<br>";

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["Upload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }

      // Check if file already exists
      /*if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }*/

      // Check file size
      if ($_FILES["Upload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["Upload"]["name"])). " has been uploaded.";
          ppTrue($_SESSION['utilisateur']);
          #header('Location: 172.18.50.11/SAE23LVNK/Controleur/monprofil07.php');
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }    
     
      pr();
    ?>
  </body>
</html>

<!DOCTYPE html>
<html>
  <body>
    <?php
      include('fonctions.php');
      setup();
      pageheader();
      pagenavbar("p07");
    ?>
    <form action="Monprofil7.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
    
    
    <?php
        $name = $_SESSION['utilisateur'];
        $role = $_SESSION['role'];
        $card = <<<EOD
                    <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center">
                      <div class="d-flex align-items-center mx-auto">
                        <div class="card" style="width:400px">
                          <img class="card-img-top" src="pp/$name.jpeg" alt="Card image" style="width:100%">
                          <div class="card-body">
                            <h4 class="card-title">$name</h4>
                            <p class="card-text">Votre rôle est $role</p>
                            <a href="#" class="btn btn-warning">Changer de photo de profil</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    EOD;
        #$card = str_replace("",$_SESSION,$card);
        echo $card;
        pagefooter();
    
    
      # Procédure d'enregistrement de l'image 
      $target_dir = "pp/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      echo $target_file;
      echo "<br>";
      echo basename($_FILES["fileToUpload"]["name"]);
      echo "<br>";
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      echo $imageFileType;
      echo "<br>";

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }    
     
      pr();
    ?>
  </body>
</html>

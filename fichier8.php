<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    if ( ! isset($_SESSION['utilisateur']) ){
      header("Location: page01.php");    
    }
    pagenavbar("p08");
    if (isset($_POST['check'])){
      $target_dir = "files/";
      $target_file = $target_dir . basename($_FILES["Upload"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if ( ! file_exists($target_file)){
        if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["Upload"]["name"])). " has been uploaded.";
          $json = file_get_contents('data/files.json');
          $files = json_decode($json, true);
  
          $_FILES["Upload"]['date'] = date("j/n/Y H:i");
          $_FILES["Upload"]['size'] = formatBytes($_FILES["Upload"]['size']);
          $_FILES["Upload"]['author'] = $_SESSION['utilisateur'];
          $_FILES["Upload"]['type'] = pathinfo($_FILES["Upload"]['name'], PATHINFO_EXTENSION);
          $_FILES["Upload"]['name'] = explode('.',$_FILES["Upload"]['name'])[0];
          array_push($files,$_FILES["Upload"]);

          $jsonString = json_encode($files, JSON_PRETTY_PRINT);
          $fp = fopen("data/files.json", 'w');
          fwrite($fp, $jsonString);
          fclose($fp);
          #header('Location: 172.18.50.11/SAE23LVNK/Monprofil7.php');
        } 
        else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
    ?>
    <div class="container-fluid text-center py-4 d-flex justify-content-center align-items-center flex-column">
      <h3 class="mb-0 pb-4 flex-fill text-center">Uploader un fichier</h3>
      <form action="fichier8.php" method="post" enctype="multipart/form-data">
        <table class="table table-secondary table-striped">
          <td class="align-middle">
            <label class="custom-file-upload">  
              <input type="file" name="Upload" multiple=True>
                <a class="btn btn-secondary"> 
                  <i class="fa fa-cloud-upload me-1"></i>
                    Parcourir dans les fichiers personnels
                </a>
              </input>
            </label>
          </td>
          <td class="align-middle">
            <?php
            if ( True ){
              echo '<button type="submit" name="check" value=True class="btn btn-success">';
            }
            else{
              echo '<button type="submit" class="btn btn-secondary disabled">';
            }
            ?>              
              <i class="fa-solid fa-circle-check fa-2x"></i>
            </button>
          </td>
        </table>
      </form>
      <h3 class="mb-0 py-4 flex-fill text-center">Arborescence de fichier</h3>
      <?php
      showFiles('');
      ?>
    </div>
    <style>
    input[type="file"] {
        display: none;
    }
    </style>
    <?php
    pr();
    ?>
  </body>
</html>

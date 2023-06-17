<!DOCTYPE html>
<html>
  <body>
    <?php
    include('../Vue/fonctions.php');
    setup();
    if ( ! isset($_SESSION['utilisateur']) ){
      header("Location: ../Controleur/accueil01.php");    
    }
    pagenavbar("p08");
    $alerte = '';
    if (isset($_POST['check'])){
      if (in_array($_SESSION['role'],["admin","manager","admin"])){
        $target_dir = "../files/";
        $target_file = $target_dir . basename($_FILES["Upload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if ( ! file_exists($target_file)){
          if (in_array($imageFileType, ["jpeg","png","pdf","zip","odt","xls","docx","jpg","txt","rar"])){
            if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
              $files = getFiles();
      
              $_FILES["Upload"]['date'] = date("j/n/Y H:i");
              $_FILES["Upload"]['size'] = formatBytes($_FILES["Upload"]['size']);
              $_FILES["Upload"]['author'] = getNom($_SESSION['utilisateur']);
              $_FILES["Upload"]['type'] = pathinfo($_FILES["Upload"]['name'], PATHINFO_EXTENSION);
              $_FILES["Upload"]['name'] = explode('.',$_FILES["Upload"]['name'])[0];
              $_FILES["Upload"]['path'] = '../files/'.$_FILES["Upload"]['name'].'.'.$_FILES["Upload"]['type'];
              array_push($files,$_FILES["Upload"]);
              writeFiles($files);
              #header('Location: 172.18.50.11/sae23lvnk/Controleur/monprofil07.php');          
            } 
            else {
              $alerte = <<<EOD
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Erreur</strong> Le fichier n'a pas pu être uploadé
                      </div>
                      EOD;
            }
          }
          else {
            $alerte =  <<<EOD
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Erreur</strong> Les fichiers .$imageFileType ne sont pas autorisés
                      </div>
                      EOD;
          }
        }
      }
      else {
        $alerte =  <<<EOD
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Erreur</strong> Vous n'êtes pas autorisé à upload un fichier
                      </div>
                      EOD;
      }
    }
    echo $alerte;
    ?>
    <div class="container-fluid text-center py-4 d-flex justify-content-center align-items-center flex-column">
      <h3 class="mb-0 pb-4 flex-fill text-center">Uploader un fichier</h3>
      <form action="fichier08.php" method="post" enctype="multipart/form-data">
        <table class="table table-info table-striped">
          <td class="align-middle">
            <label class="custom-file-upload">  
              <input type="file" name="Upload" multiple=True>
                <a class="btn btn-light"> 
                  <i class="fa fa-cloud-upload me-1"></i>
                    Parcourir dans les fichiers personnels
                </a>
              </input>
            </label>
          </td>
          <td class="align-middle">
            <button type="submit" name="check" value=True class="btn btn-success">
              <i class="fa-solid fa-circle-check fa-2x"></i>
            </button>
          </td>
        </table>
      </form>
      <h3 class="mb-0 py-4 flex-fill text-center">Arborescence de fichiers</h3>
      <?php
      showFiles();
      ?>
    </div>

    <script>
      var btnsSupprimer = document.getElementsByClassName("btn-danger");
      var btnsTelecharger = document.getElementsByClassName("btndl");

      // Parcourir tous les boutons et ajouter un gestionnaire d'événement
      for (var i = 0; i < btnsSupprimer.length; i++) {
        btnsSupprimer[i].addEventListener("click", function() {
          // Récupérer le paramètre spécifique à partir de l'attribut personnalisé
          var parametre = this.getAttribute("data-parametre");

          // Créer une instance de l'objet XMLHttpRequest
          var xhr = new XMLHttpRequest();

          // Construire les données à envoyer
          var data = new FormData();
          data.append("parametre", parametre);

          // Configurer la requête Ajax avec la méthode POST et l'URL cible
          xhr.open("POST", "../Vue/btn_suppr.php", true);

          // Envoyer la requête Ajax avec les données
          xhr.send(data);
        });
      }
      for (var i = 0; i < btnsTelecharger.length; i++) {
        btnsTelecharger[i].addEventListener("click", function() {
          // Récupérer le paramètre spécifique à partir de l'attribut personnalisé
          var parametre = this.getAttribute("data-parametre");

          // Créer une instance de l'objet XMLHttpRequest
          var xhr = new XMLHttpRequest();

          // Construire les données à envoyer
          var data = new FormData();
          data.append("parametre", parametre);

          // Configurer la requête Ajax avec la méthode POST et l'URL cible
          xhr.open("POST", "../Vue/btn_dl.php", true);

          // Envoyer la requête Ajax avec les données
          xhr.send(data);
        });
      }
    </script>
    <style>
    input[type="file"] {
        display: none;
    }
    </style>
  </body>
</html>

<!DOCTYPE html>
<html>
  <body>
    <?php
    include('../Vue/fonctions.php');
    setup();
    if ( !isset($_SESSION['utilisateur'])){
    header("Location: ../Controleur/accueil01.php");
    }
    pagenavbar("p03");
    ?><br ><br >
    <form id="car-form" method="post" class="text-center" enctype="multipart/form-data">
    <div class="container border border-4 border-warning">
      <BR >
    <div class="container">
      <h2><strong>Formulaire de voiture</strong></h2>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="marque"><strong>Marque :</strong></label>
            <input type="text" class="form-control" id="marque" name="marque" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="modele"><strong>Modèle :</strong></label>
            <input type="text" class="form-control" id="modele" name="modele" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="annee"><strong>Année :</strong></label>
            <input type="number" class="form-control" id="annee" name="annee" required>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
        <h3 class="text-center mb-4"><strong>Informations supplémentaires</strong></h3>
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
                    <label for="prix" class="col-form-label"><strong>Prix :</strong></label>
                    <input type="number" class="form-control" id="prix" name="prix" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="etat" class="col-form-label"><strong>Etat :</strong></label>
                    <select class="form-control" id="etat" name="etat" required>
                        <option value="Neuf">Neuf</option>
                        <option value="Occasion">Occasion</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="kilometrage" class="col-form-label"><strong>Kilométrage :</strong></label>
                    <input type="number" class="form-control" id="kilometrage" name="kilometrage" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="couleur" class="col-form-label"><strong>Couleur :</strong></label>
                    <input type="text" class="form-control" id="couleur" name="couleur" required>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <h3 class="text-center mb-4"><strong>Caractéristiques techniques</strong></h3>
    <div class="row">
        <div class="col-md-4">
          <div class="form-group">
                <label for="carburant" class="col-form-label"><strong>Carburant :</strong></label>
                <select class="form-control" id="carburant" name="carburant" required>
                    <option value="Essence">Essence</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hybrid">Hybride</option>
                    <option value="Electrique">Electrique</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="puissance" class="col-form-label"><strong>Puissance :</strong></label>
                <input type="number" class="form-control" id="puissance" name="puissance" min="1" max="500" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="boite" class="col-form-label"><strong>Boite :</strong></label>
                <select class="form-control" id="boite" name="boite" required>
                    <option value="Automatique">Automatique</option>
                    <option value="Manuelle">Manuelle</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br >
<div class='container'>
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label for="description" class="col-sm-2 col-form-label"><strong>Description :</strong></label>

        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
</div>
<div class="col-sm-6">
    <label for="image" class="col-sm-2 col-form-label"><strong>Image :</strong></label>

        <div class="custom-file">
        <input type="file" class="custom-file-input btn btn-warning text-white " id="image" name="image" accept="image/png, image/jpeg, image/gif" required>
        


        </div>
    </div>
</div>
</div>
<br >
<div class='container'>
  <div class="row">
      <div class="col-md-2">
      <div class="form-group">
          <label for="maniabilite" class="col-form-label"><strong>Maniabilité :</strong></label>
          <input type="number" id="maniabilite" name="maniabilite" min="1" max="5" class="form-control" required>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group">
          <label for="fiabilite" class="col-form-label"><strong>Fiabilité :</strong></label>
          <input type="number" id="fiabilite" name="fiabilite" min="1" max="5" class="form-control" required>
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group">
          <label for="confort" class="col-form-label"><strong>Confort :</strong></label>
          <input type="number" id="confort" name="confort" min="1" max="5" class="form-control" required>
      </div>
      </div>
      <div class="col-md-1">
      <div class="form-group">
  </div>
  </div>
      <div class="col-md-4">
      <div class="form-group">
      <img id="preview-image" src="#" alt="Aperçu de l'image" class="img-fluid" style="display: none; margin-top: 10px;">
      </div>
    </div>
    </div>
    </div>
 <br >


 <input type="submit" value="Créer une voiture" class="btn btn-warning text-white ">

</form> 
</br> 
</div></div>  


    <script>




          $(document).ready(function() {
            // Appliquer la restriction de nombre seulement pour les champs avec la classe "note"
            $('.note').on('input', function() {
              var value = $(this).val();
              var min = 1;
              var max = 5;
              if (value < min) {
                $(this).val(min);
              }
              else if (value > max) {
                $(this).val(max);
              }
            });
          });

          $(document).ready(function() {
  $('#image').change(function() {
    var file = $(this)[0].files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preview-image').attr('src', e.target.result).show();
      };
      reader.readAsDataURL(file);
    } else {
      $('#preview-image').attr('src', '#').hide();
    }
  });
});
    </script>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Récupérer les données du formulaire
      $marque = $_POST["marque"];
      $modele = $_POST["modele"];
      $annee = intval($_POST["annee"]);
      $prix = floatval($_POST["prix"]);
      $etat = $_POST["etat"];
      $kilometrage = intval($_POST["kilometrage"]);
      $couleur = $_POST["couleur"];
      $carburant = $_POST["carburant"];
      $boite = $_POST["boite"];
      $description = $_POST["description"];
      $puissance = intval($_POST["puissance"]);
      $maniabilite = intval($_POST["maniabilite"]);
      $fiabilite = intval($_POST["fiabilite"]);
      $confort = intval($_POST["confort"]);

      // Vérifier si un fichier a été sélectionné
      if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
    
        // Extraire le nom du fichier
        $filename = basename($image);
    
        // Déplacer le fichier temporaire vers l'emplacement souhaité
        move_uploaded_file($image_tmp, "../images/" . $filename);
        $image = "../images/" . $filename;
    
        echo "<br ><div class='alert bg-success'>
        <strong>Confirmation :</strong> La voiture a été ajouté.</div>";    
      } 
    
    
  


      // Charger le contenu du fichier JSON dans une variable
      $data = file_get_contents("../data/voitures.json");

      // Convertir le contenu JSON en tableau associatif
      $voitures = json_decode($data, true);

      // Créer un nouvel objet voiture avec les données du formulaire
      $nouvelle_voiture = array(
        "marque" => $marque,
        "modele" => $modele,
        "annee" => $annee,
        "prix" => $prix,
        "etat" => $etat,
        "kilometrage" => $kilometrage,
        "couleur" => $couleur,
        "carburant" => $carburant,
        "boite" => $boite,
        "description" => $description,
        "puissance" => $puissance,
        "maniabilite" => $maniabilite,
        "fiabilite" => $fiabilite,
        "confort" => $confort,
        "image" => $image
      );

      // Ajouter le nouvel objet voiture au tableau existant
      $voitures["voitures"][] = $nouvelle_voiture;

      // Convertir le tableau associatif en format JSON
      $nouveau_contenu = json_encode($voitures, JSON_PRETTY_PRINT);

      // Écrire le nouveau contenu dans le fichier JSON
      file_put_contents("../data/voitures.json", $nouveau_contenu);

    }
    ?>
<style>
  .custom-container {
    background-color: #E7C349;
    padding: 20px;
    color: white;
  }
</style>
  </body>
</html>

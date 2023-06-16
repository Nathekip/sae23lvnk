<!DOCTYPE html>
<html>
  <body>
    <?php
    include('../Vue/fonctions.php');
    setup();
    pagenavbar("p03");
    pr();
    <form id="car-form" method="post" class="text-center" enctype="multipart/form-data">
    <div class="container">
      <h2>Formulaire de voiture</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="marque">Marque :</label>
            <input type="text" class="form-control" id="marque" name="marque" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="modele">Modèle :</label>
            <input type="text" class="form-control" id="modele" name="modele" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="annee">Année :</label>
            <input type="number" class="form-control" id="annee" name="annee" required>
          </div>
        </div>
      </div>
    </div>


    <div class="form-group">
      <h3 class="text-center mb-4">Informations supplémentaires</h3>

      <div class="form-row justify-content-center">
        <div class="form-group col-md-3">
          <label for="prix" class="col-form-label">Prix :</label>
          <input type="number" class="form-control" id="prix" name="prix" required>
        </div>

        <div class="form-group col-md-3">
          <label for="etat" class="col-form-label">Etat :</label>
          <select class="form-control" id="etat" name="etat" required>
            <option value="Neuf">Neuf</option>
            <option value="Occasion">Occasion</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="kilometrage" class="col-form-label">Kilométrage :</label>
          <input type="number" class="form-control" id="kilometrage" name="kilometrage" required>
        </div>

        <div class="form-group col-md-3">
          <label for="couleur" class="col-form-label">Couleur :</label>
          <input type="text" class="form-control" id="couleur" name="couleur" required>
        </div>
      </div>
    </div>


    <div class="form-group">
      <h3 class="text-center mb-4">Caractéristiques techniques</h3>

      <div class="form-row justify-content-center">
        <div class="form-group col-md-3">
          <label for="carburant" class="col-form-label">Carburant :</label>
          <select class="form-control" id="carburant" name="carburant" required>
            <option value="Essence">Essence</option>
            <option value="Diesel">Diesel</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Electrique">Electrique</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="puissance" class="col-form-label">Puissance :</label>
          <input type="number" class="form-control" id="puissance" name="puissance" min="1" max="500" required>
        </div>

        <div class="form-group col-md-3">
          <label for="boite" class="col-form-label">Boite :</label>
          <select class="form-control" id="boite" name="boite" required>
            <option value="Automatique">Automatique</option>
            <option value="Manuelle">Manuelle</option>
          </select>
        </div>
      </div>
    </div>


        <div class="form-group row justify-content-center">
          <label for="description" class="col-sm-2 col-form-label">Description :</label>
          <div class="col-sm-6">
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
        </div>


        <div class="form-group row justify-content-center">
          <label for="image" class="col-sm-2 col-form-label">Image :</label>
          <div class="col-sm-6">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image" required>
              <label class="custom-file-label" for="image">Choisir un fichier</label>
            </div>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <label for="maniabilite" class="col-sm-2 col-form-label">Maniabilité :</label>
          <div class="col-sm-2">
            <input type="number" id="maniabilite" name="maniabilite" min="1" max="5" class="form-control" required>
          </div>
          <label for="fiabilite" class="col-sm-2 col-form-label">Fiabilité :</label>
          <div class="col-sm-2">
            <input type="number" id="fiabilite" name="fiabilite" min="1" max="5" class="form-control" required>
          </div>
          <label for="confort" class="col-sm-2 col-form-label">Confort :</label>
          <div class="col-sm-2">
            <input type="number" id="confort" name="confort" min="1" max="5" class="form-control" required>
          </div>
        </div>
        <input type="submit" value="Créer voiture">
    </form>


    <script>
      const input = document.getElementById('image');
      const preview = document.getElementById('preview-image');
      const customLabel = document.querySelector('.custom-file-label');

      input.addEventListener('change', () => {
        const file = input.files[0];
        const reader = new FileReader();

        reader.addEventListener('load', () => {
          preview.src = reader.result;
          preview.style.display = 'block';
        });

        reader.readAsDataURL(file);

        // Change custom file label to display file name
        customLabel.textContent = file.name;
      });



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
      $image = $_POST["image"];

      // Charger le contenu du fichier JSON dans une variable
      $data = file_get_contents("voitures1.json");

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
      file_put_contents("voitures1.json", $nouveau_contenu);

    }
    ?>

    ?>
  </body>
</html>

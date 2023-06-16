<!DOCTYPE html>
<html>
  <body>
    <?php
    include('../Vue/fonctions.php');
    setup();
    pagenavbar("p02");
    // Lecture du fichier JSON
    $json = file_get_contents('../data/voitures.json');
    // Décodage du JSON en tableau associatif
    $data = json_decode($json, true);
    // Stockage des données de voitures dans un tableau
    $voitures = $data['voitures'];
    shuffle($voitures);
    $etat = isset($_POST['etat']) ? $_POST['etat'] : "tous";
    $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : "toutes";
    $prix_min = isset($_POST['prix_min']) ? $_POST['prix_min'] : "";
    $prix_max = isset($_POST['prix_max']) ? $_POST['prix_max'] : "";
    $modele1 = isset($_POST['modele1']) ? $_POST['modele1'] : "";

    $tri = null;
    if (isset($_POST['tri'])) {
      $tri_option = $_POST['tri'];
      if ($tri_option == "croissant") {
        $tri = 'trierParPrixCroissant';
      } else if ($tri_option == "decroissant") {
        $tri = 'trierParPrixDecroissant';
      }
    }

    if ($tri) {
      usort($voitures, $tri);
      }
    ?>
    <div class="container">
      <form method="post" class="bg-light p-4 rounded shadow">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="modele" class="form-label">Modèle :</label>
              <input type="text" class="form-control" id="modele1" name="modele1" placeholder="Entrez le modèle de la voiture">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="etat" class="form-label">État :</label>
              <select class="form-control" name="etat" id="etat">
                <option value="tous" <?php if($etat=="tous") echo "selected"; ?>>Tout état</option>
                <option value="Neuf" <?php if($etat=="Neuf") echo "selected"; ?>>Neuf</option>
                <option value="Occasion" <?php if($etat=="Occasion") echo "selected"; ?>>Occasion</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="couleur" class="form-label">Couleur :</label>
              <select class="form-control" name="couleur" id="couleur">
                <option value="toutes" <?php if($couleur=="toutes") echo "selected"; ?>>Toute couleur</option>
                <option value="noir" <?php if($couleur=="noir") echo "selected"; ?>>Noir</option>
                <option value="gris" <?php if($couleur=="gris") echo "selected"; ?>>Gris</option>
                <option value="bleu" <?php if($couleur=="bleu") echo "selected"; ?>>Bleu</option>
                <option value="rouge" <?php if($couleur=="rouge") echo "selected"; ?>>Rouge</option>
                <option value="blanc" <?php if($couleur=="blanc") echo "selected"; ?>>Blanc</option>
                <option value="jaune" <?php if($couleur=="jaune") echo "selected"; ?>>Jaune</option>
                <option value="argent" <?php if($couleur=="argent") echo "selected"; ?>>Argent</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="prix_min" class="form-label">Prix minimum :</label>
                <input type="number" class="form-control" id="prix_min" name="prix_min" value="<?php echo $prix_min; ?>" placeholder="Prix min">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="prix_max" class="form-label">Prix maximum :</label>
                <input type="number" class="form-control" id="prix_max" name="prix_max" value="<?php echo $prix_max; ?>" placeholder="Prix max">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <select name="tri" class="form-select mb-2">
              <option value="" selected>Trier par prix</option>
              <option value="croissant">Prix croissant</option>
              <option value="decroissant">Prix décroissant</option>
            </select>
          </div>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-outline-secondary">Filtrer</button>
        </div>
      </form>
      <div class="row mt-5">
        <?php afficherVoitures($voitures, $etat, $couleur, $prix_min, $prix_max, $modele1); ?>
      </div>
    </div>
  </body>
</html>    

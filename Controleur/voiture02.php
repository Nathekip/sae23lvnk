<!DOCTYPE html>
<html>
  <body>
    <?php
    include('../Vue/fonctions.php');
    include('../Modele/voitures.php);
    setup();
    pagenavbar("p02");
    // Lecture du fichier JSON
    $json = file_get_contents('../data/voitures.json');
    // Décodage du JSON en tableau associatif 
    $data = json_decode($json, true);
    // Stockage des données de voitures dans un tableau
    $voitures = $data['voitures'];

    $etat = isset($_POST['etat']) ? filter_input(INPUT_POST, 'etat', FILTER_SANITIZE_STRING) : "tous";
    $couleur1 = isset($_POST['couleur']) ? filter_input(INPUT_POST, 'couleur', FILTER_SANITIZE_STRING) : "toutes";
    $prix_min = isset($_POST['prix_min']) ? filter_input(INPUT_POST, 'prix_min', FILTER_SANITIZE_NUMBER_FLOAT) : "";
    $prix_max = isset($_POST['prix_max']) ? filter_input(INPUT_POST, 'prix_max', FILTER_SANITIZE_NUMBER_FLOAT) : "";
    $modele1 = isset($_POST['modele1']) ? filter_input(INPUT_POST, 'modele1', FILTER_SANITIZE_STRING) : "";

    if (isset($_POST['tri'])) {
      $tri_option = $_POST['tri'];
      if ($tri_option == "croissant") {
        usort($voitures, 'trierParPrixCroissant');
      } else if ($tri_option == "decroissant") {
        usort($voitures, 'trierParPrixDecroissant');
      } else {
        shuffle($voitures);
      }
    }
    ?>
    <BR>
    <div class="container">
      <form method="post" class="bg-light p-4 rounded shadow">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="modele" class="form-label">Modèle ou marque:</label>
              <input type="text" class="form-control" id="modele1" name="modele1" placeholder="Entrez le modèle ou la marque de la voiture" value="<?php echo htmlspecialchars($modele1); ?>">
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
                <option value="toutes" <?php if($couleur1=="toutes") echo "selected"; ?>>Toute couleur</option>
                <option value="noir" <?php if($couleur1=="noir") echo "selected"; ?>>Noir</option>
                <option value="gris" <?php if($couleur1=="gris") echo "selected"; ?>>Gris</option>
                <option value="bleu" <?php if($couleur1=="bleu") echo "selected"; ?>>Bleu</option>
                <option value="rouge" <?php if($couleur1=="rouge") echo "selected"; ?>>Rouge</option>
                <option value="blanc" <?php if($couleur1=="blanc") echo "selected"; ?>>Blanc</option>
                <option value="jaune" <?php if($couleur1=="jaune") echo "selected"; ?>>Jaune</option>
                <option value="argent" <?php if($couleur1=="argent") echo "selected"; ?>>Argent</option>
              </select>
            </div>
          </div>
        </div>
        <BR>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="prix_min" class="form-label">Prix minimum :</label>
                <input type="text" class="form-control" id="prix_min" name="prix_min" placeholder="Entrez le prix minimum" value="<?php echo htmlspecialchars($prix_min); ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="prix_max" class="form-label">Prix maximum :</label>
                <input type="text" class="form-control" id="prix_max" name="prix_max" placeholder="Entrez le prix maximum" value="<?php echo htmlspecialchars($prix_max); ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tri_prix" class="form-label">Trier par prix :</label>
                <select class="form-control" id="tri_prix" name="tri">
                  <option value="">Tous</option>
                  <option value="croissant">Croissant</option>
                  <option value="decroissant">Décroissant</option>
                </select>
              </div>
            </div>
          </div>
          <BR>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-outline-secondary">Filtrer</button>
        </div>
      </form>
      <div class="row mt-5">
        <?php afficherVoitures($voitures, $etat, $couleur1, $prix_min, $prix_max, $modele1); ?>
      </div>
    </div>
    <?php
    // Suppression de voiture
    if (isset($_POST['suppressionvoiture'])){
      $caracteristiques = explode("/",$_POST['suppressionvoiture']);
      deleteVoiture($caracteristiques);
      header("Location : ../Controleur/voiture02.php");
    }
    ?>
  </body>
</html>

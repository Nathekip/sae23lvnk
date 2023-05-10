<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Récapitulatif de réservation</title>
  <!-- Liens vers les fichiers CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
    <h1 class="mb-4">Récapitulatif de réservation</h1>
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo $_POST['image']; ?>" class="img-fluid" alt="Photo de la voiture">
      </div>
      <div class="col-md-8">
        <h3><?php echo $_POST['marque'] . ' ' . $_POST['modele']; ?></h3>
        <p><?php echo $_POST['description']; ?></p>
        <ul>
          <li>Année : <?php echo $_POST['annee']; ?></li>
          <li>Prix : <?php echo $_POST['prix']; ?> €</li>
          <li>État : <?php echo $_POST['etat']; ?></li>
          <li>Kilométrage : <?php echo $_POST['kilometrage']; ?> km</li>
          <li>Couleur : <?php echo $_POST['couleur']; ?></li>
          <li>Carburant : <?php echo $_POST['carburant']; ?></li>
          <li>Boîte de vitesses : <?php echo $_POST['boite']; ?></li>
          <li>Puissance : <?php echo $_POST['puissance']; ?> ch</li>
        </ul>
        <form method="post" action="confirmation.php">
          <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="ville">Ville de réservation :</label>
          <select class="form-control" id="ville" name="ville" required>
            <option value="Amiens">Amiens</option>
            <option value="Avignon">Avignon</option>
            <option value="Bayonne">Bayonne</option>
            <option value="Besançon">Besançon</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Bourges">Bourges</option>
            <option value="Caen">Caen</option>
            <option value="Calais">Calais</option>
            <option value="Clermont Ferrand">Clermont Ferrand</option>
            <option value="Dijon">Dijon</option>
            <option value="Grenoble">Grenoble</option>
            <option value="La Rochelle">La Rochelle</option>
            <option value="Le Havre">Le Havre</option>
            <option value="Lille">Lille</option>
            <option value="Limoges">Limoges</option>
            <option value="Lyon">Lyon</option>
            <option value="Macon">Macon</option>
            <option value="Metz">Metz</option>
            <option value="Montpellier">Montpellier</option>
            <option value="Mulhouse">Mulhouse</option>
            <option value="Nancy">Nancy</option>
            <option value="Nantes">Nantes</option>
            <option value="Nimes">Nimes</option>
            <option value="Orléans">Orléans</option>
            <option value="Pau">Pau</option>
            <option value="Paris">Paris</option>
            <option value="Perpignan">Perpignan</option>
            <option value="Poitiers">Poitiers</option>
            <option value="Rennes">Rennes</option>
            <option value="Reims">Reims</option>
            <option value="Rouen">Rouen</option>
            <option value="Saint Etienne">Saint Etienne</option>
            <option value="Saint-Brieuc">Saint-Brieuc</option>
            <option value="Saint-Malo">Saint-Malo</option>
            <option value="Strasbourg">Strasbourg</option>
            <option value="Tours">Tours</option>
            <option value="Toulouse">Toulouse</option>
            <option value="Troyes">Troyes</option>
          </select>


          </div>
          <input type="hidden" name="marque" value="<?php echo $_POST['marque']; ?>">
          <input type="hidden" name="modele" value="<?php echo $_POST['modele']; ?>">
          <input type="hidden" name="annee" value="<?php echo $_POST['annee']; ?>">
          <input type="hidden" name="prix" value="<?php echo $_POST['prix']; ?>">
          <input type="hidden" name="etat" value="<?php echo $_POST['etat']; ?>">
          <input type="hidden" name="kilometrage" value="<?php echo $_POST['kilometrage']; ?>">
          <input type="hidden" name="couleur" value="<?php echo $_POST['couleur']; ?>">
          <input type="hidden" name="carburant" value="<?php echo $_POST['carburant']; ?>">
          <input type="hidden" name="boite" value="<?php echo $_POST['boite']; ?>">
          <input type="hidden" name="puissance" value="<?php echo $_POST['puissance']; ?>">
          <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Liens vers les fichiers JavaScript de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body> 
</html>

<?php
      include('../Vue/fonctions.php');
      setup();
      pagenavbar("");
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation de réservation</title>
</head>
<body>
  <div class="container">
    <h1 class="text-success">Confirmation de votre réservation</h1>
    <div class="card">
      <div class="card-header">Récapitulatif de votre réservation</div>
      <div class="card-body">
        <p>Vous avez réservé la voiture suivante :</p>
        <ul class="list-unstyled">
          <li><strong>Marque :</strong> <?php echo $_POST['marque']; ?></li>
          <li><strong>Modèle :</strong> <?php echo $_POST['modele']; ?></li>
          <li><strong>Année :</strong> <?php echo $_POST['annee']; ?></li>
          <li><strong>Prix :</strong> <?php echo $_POST['prix']; ?> €</li>
          <li><strong>État :</strong> <?php echo $_POST['etat']; ?></li>
          <li><strong>Kilométrage :</strong> <?php echo $_POST['kilometrage']; ?> km</li>
          <li><strong>Couleur :</strong> <?php echo $_POST['couleur']; ?></li>
          <li><strong>Carburant :</strong> <?php echo $_POST['carburant']; ?></li>
          <li><strong>Boîte de vitesses :</strong> <?php echo $_POST['boite']; ?></li>
        </ul>
        <br>
        <p>Votre réservation a été effectuée avec succès. Nous vous remercions pour votre confiance et vous souhaitons une agréable expérience avec notre voiture.</p>
        <p>Votre voiture sera disponible dans notre agence de <?php echo $_POST['ville']; ?>, et n'hésitez pas à suivre son avancement.</p>
      </div>
    </div>
  </div>

</body>
</html>

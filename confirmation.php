<?php
      include('fonctions.php');
      setup();
    
// Vérifie si les données de réservation ont été soumises via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données de réservation depuis le formulaire
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix'];
    $etat = 'en preparation'; // État initial de la commande
    $ville = $_POST['ville'];

    // Crée un tableau associatif pour stocker les données de réservation
    $reservation = [
        'marque' => $marque,
        'modele' => $modele,
        'annee' => $annee,
        'prix' => $prix,
        'ville' => $ville
    ];

    // Récupère les données du fichier reserv.json dans la variable $reserv
    $json = file_get_contents('data/reserv.json');
    $reserv = json_decode($json, true);

    // Intègre $reservation dans $reserv
    $reserv[$_SESSION['utilisateur']][$modele] = $reservation;

    // Écrit le tableau $reserv dans le fichier 'reserv.json'
    $fp = fopen("data/reserv.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($reserv, JSON_PRETTY_PRINT);
    $fp = fopen("data/reserv.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation de réservation</title>
  <style>
    body {
      background-color: #f9f9f9;
      font-family: Arial, sans-serif;
    }

    .container {
      margin: 0 auto;
      max-width: 800px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    h1 {
      color: #2ecc71;
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    h3 {
      font-size: 1.8rem;
      margin-top: 0;
    }

    p {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }

    ul {
      list-style: none;
      padding-left: 0;
      margin-bottom: 20px;
    }

    li {
      font-size: 1.1rem;
      margin-bottom: 5px;
    }

    label {
      display: inline-block;
      margin-bottom: 5px;
      font-size: 1.1rem;
      font-weight: bold;
      text-align: left;
    }

    input, select {
      border: 2px solid #2ecc71;
      border-radius: 5px;
      padding: 10px;
      font-size: 1.1rem;
      margin-bottom: 20px;
      width: 100%;
    }

    input[type="submit"] {
      background-color: #2ecc71;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 1.2rem;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #27ae60;
    }
  </style>
</head>



<body>
<?php
      pr();
    ?>
  <div class="container">
    <h1>Confirmation de votre réservation</h1>
        <div class="card">
          <div class="card-header">Récapitulatif de votre réservation</div>
          <div class="card-body">
            <p>Vous avez réservé la voiture suivante :</p>
            <ul>
              <li>Marque : <?php echo $_POST['marque']; ?></li>
              <li>Modèle : <?php echo $_POST['modele']; ?></li>
              <li>Année : <?php echo $_POST['annee']; ?></li>
              <li>Prix : <?php echo $_POST['prix']; ?> €</li>
              <li>Kilométrage : <?php echo $_POST['kilometrage']; ?> km</li>
              <li>Carburant : <?php echo $_POST['carburant']; ?></li>
              <li>Boîte de vitesses : <?php echo $_POST['boite']; ?></li>
            </ul>
            <br>
            <p>Votre réservation a été effectuée avec succès. Nous vous remercions <?php echo $_SESSION['utilisateur'] ?> pour votre confiance et vous souhaitons une agréable expérience avec notre voiture.</p>
            <p>Votre voiture sera disponible dans notre agence de <?php echo $_POST['ville']; ?>, et n'hésitez pas à suivre son avancement.</p>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Liens vers les fichiers JavaScript de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

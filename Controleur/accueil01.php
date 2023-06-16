<!DOCTYPE html>
<html lang="fr">

<head>
  <?php
  include('../Vue/vu_accueil01.php');
  include('../Vue/fonctions.php');
  include('../Modele/partenaire.php');
  include('../Vue/fonctions.js');
  setup();
  pagenavbar();
  ?>
</head>

<body>
  <?php 
    arrive();
    timeline();
    presentation();
    services();
    fondateurs();
    partenaire(getpartenaire());
    pagefooter();
  ?>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php
  include('../Vue/vu_accueil01.php');
  include('../Vue/fonctions.php');
  setup();
  $sessionoeil = isset($_SESSION['MdpBool']) || isset($_SESSION['CmdpBool']);
  if ($sessionoeil){
    unset($_SESSION['MdpBool']);
    unset($_SESSION['CmdpBool']);
  }
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

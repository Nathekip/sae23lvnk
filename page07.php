<!DOCTYPE html>
<html>
<head>
    <?php
        include('functions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
    <?php
        pageheader();
        echo pagenavbar("p07");
        $name = $_SESSION['utilisateur'];
        $role = $_SESSION['role'];
        $card = <<<EOD
        <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center">
  <div class="d-flex align-items-center mx-auto">
    <div class="card" style="width:400px">
      <img class="card-img-top" src="images/user.png" alt="Card image" style="width:100%">
      <div class="card-body">
        <h4 class="card-title">$name</h4>
        <p class="card-text">Votre rôle est $role</p>
        <a href="#" class="btn btn-warning">Changer de photo de profil</a>
      </div>
    </div>
  </div>
</div>

EOD;
echo $card;


        pagefooter();
    ?>
</body>
</html>

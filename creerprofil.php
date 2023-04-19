<!DOCTYPE html>
<html>
<head>
    <?php
        include('fonctions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
     
<br><br><br><br><br><br>
  <div class="container-fluid bg-info text-center py-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center mx-auto">
    <div class="login-form">
      <form action="connexion_traitement.php" method="post">
        <div class="form-group">
          <label>Utilisateur</label>
          <input type="text" class="form-control" name="utilisateur" placeholder="Utilisateur">
        </div>
        <div class="form-group">
          <label>Mot de passe</label>
          <input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn">Se connecter</button>
      </form>
    </div>
  </div>


        <?php        
        pagefooter();
    ?>
</body>
</html>

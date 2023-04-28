<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pageheader();
    pagenavbar("p04");
    pr();
    ?>
    <form action="oublimdp6.php" method="post">
      Votre nouveau mot de passe
      <div class="pt-1 mb-3 input-group">
        <input type="password" id="mdp" value="PhrMdp" class="form-control" name="mdp" placeholder="Entrez votre nouveau mdp">
        <button type="submit" class="btn btn-warning" name="mdpoeil" value=True>
          <i class="fa-solid fa-eye"></i>
        </button>                      
      </div>
      Confirmez votre nouveau mot de passe
      <div class="pt-1 mb-3 input-group">
        <input type="password" id="cmdp" class="form-control" name="cmdp" placeholder="Confirmez votre mdp">
        <button type="submit" class="btn btn-warning" name="cmdpoeil" value=True>
          <img src="images/ShPwd.png" alt="Show Password">
        </button>
      </div>
      <div class="pt-2 mb-3 d-grid">
        <i class="fa-solid fa-eye"></i>
          Réinitialiser le mot de passe
        </button>
      </div>
    </form>
  </body>
</html>

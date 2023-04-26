<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pageheader();
    pagenavbar("p04");
    if ( isset($_POST['zoubli'])  ){
      echo "aaaaaaaaaaaaaaaaaaaa";
      $_SESSION['PhaseMdp'] == False;                  
    }
    pr();
    ?>
    <form method="post" action="page04.php">
      <button type="submit" name="zoubli" class="btn btn-link">
        Revenir en arrière
      </button>
    </form>
  </body>
</html>

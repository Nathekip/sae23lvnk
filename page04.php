<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pageheader();
    pagenavbar("p04");
    if ( $_POST['oop'] == 'test' ){
      echo "aaaaaaaaaaaaaaaaaaaa";
      $_SESSION['PhaseMdp'] == False;                  
    }
    pr();
    ?>
    <form method="post" action="page04.php">
      <button type="submit" value="test" name"oop" class="btn btn-link">
        Revenir en arrière
      </button>
    </form>
  </body>
</html>

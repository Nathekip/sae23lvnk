<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pagenavbar("p04");
    echo "<br>";
    echo "44 ";
    echo "<br>";
    $a = substr("44 ", 0, 3);
    echo $a;
    echo "<br>";
    $b = trim($a," ");
    echo $b;
    pr();
    ?>
  </body>
</html>

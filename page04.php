<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    pagenavbar("p04");
    $a = "974 ------- La trix";
    echo "$a|";
    echo "<br>";
    $b = substr($a, 0, 3);
    echo "$b|";
    echo "<br>";
    $c = trim($b," ");
    echo "$c|";
    echo "<br>";
    $a = "44 ------- La trix";
    echo "$a|";
    echo "<br>";
    $b = substr($a, 0, 3);
    echo "$b|";
    echo "<br>";
    $c = trim($b," ");
    echo "$c|";
    pr();
    ?>
  </body>
</html>

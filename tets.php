<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    echo pagenavbar("");
    
    $fp = fopen("data/test.txt", 'w');
    fwrite($fp, "aaaaaaaaa");
    fclose($fp);
    
    ?>
  </body>
</html>

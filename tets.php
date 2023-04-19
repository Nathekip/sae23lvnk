<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    echo pagenavbar("");
    
    $myfile = fopen("./data/test.txt", "w") or die("Unable to open file!");
    $txt = "aaaaaaaaa Doe\n";
    fwrite($myfile, $txt);
    $txt = "bbbbbbbbbbbbbb do\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    ?>
  </body>
</html>

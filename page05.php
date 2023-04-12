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
    echo pagenavbar("p05"); 
    $json = file_get_contents('data/data.json');
    $livres = json_decode($json, true);
    echo "<pre>";
    print_r($livres);
    echo "</pre>";
    pagefooter();
    ?>
</body>
</html>
<!DOCTYPE html>
<html>
  <body>
    <?php
    include('../Vue/fonctions.php');
    setup();
    pagenavbar("p04");
    addChat('useremmeteur','userrecepteur','message tah Lewandoskaïe');
    echo "<pre>";
    $json = file_get_contents('chat/useremmeteur_userrecpteur.json');
    $chat = json_decode($json, true);
    print_r($chat);
    ?>
  </body>
</html>

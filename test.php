<!DOCTYPE html>
<html>
  <body>
    <?php
    include('fonctions.php');
    setup();
    echo pagenavbar("");
    
    $myfile = fopen("data/users.json", "w") or die("Unable to open file!");
    $txt = '{
              "admin": {
                  "user": "admin",
                  "mdp": "$2y$10$X33\/IU\/aEzXcwMsLlNHiQOxAIDP8Mmf9XA\/10CgG5HXxOX4mzljOG",
                  "role": "admin"
              },
              "Georges": {
                  "user": "Georges",
                  "mdp": "$2y$10$ZNV.ZOONEsKxPkEuKrES8easrmY58MENrmonatzNz1bBV5xt3hqre",
                  "role": "user"
                }
              }';
    fwrite($myfile, $txt);
    fclose($myfile);
    
    ?>
  </body>
</html>

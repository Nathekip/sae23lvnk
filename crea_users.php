<?php

include('fonctions.php');
function newUsers(){
    
    echo "salut !";

    $fp = fopen("data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    addUser('admin', 'bonjour', 'admin@gmail.com', 'admin');
    addUser('Georges', 'bonjour', 'georges47@hotmail.com');
    addUser('Kono', 'bonjour', 'konolafripouilledu22@gmail.com');
    addUser('hjeunecrack', 'bonjour', 'hjeune@crack.org');
    addUser('foret', 'bonjour', 'arbre@ecosia.tz', 'visitor');
    addUser('Emilie', 'bonjour', 'emilieflocon@laposte.net', 'admin');

}
newUsers();

?>

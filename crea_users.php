<?php

include('fonctions.php');
function newUsers(){
    
    echo "salut !";

    $fp = fopen("data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    addUser('admin', 'bonjour', 'admin@gmail.com', 'admin',1,'codesecret');
    addUser('Georges', 'bonjour', 'georges47@hotmail.com');
    addUser('Kono', 'bonjour', 'konolafripouilledu22@gmail.com',1,'Louis');
    addUser('hjeunecrack', 'bonjour', 'hjeune@crack.org',3,'moi');
    addUser('foret', 'bonjour', 'arbre@ecosia.tz', 'visitor',3,'Amazone');
    addUser('Emilie', 'bonjour', 'emilieflocon@laposte.net', 'admin',2,'Berlin');

}
newUsers();

?>

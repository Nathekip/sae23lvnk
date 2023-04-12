<?php

include('functions.php');
function newUsers(){

    $fp = fopen("data/users2.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    addUser('admin', 'bonjour', 'admin');
    addUser('Georges', 'bonjour');
    addUser('Kono', 'bonjour');
    addUser('hjeunecrack', 'bonjour');
    addUser('foret', 'bonjour', 'visitor');
    addUser('Emilie', 'bonjour', 'admin');

}
newUsers();

?>
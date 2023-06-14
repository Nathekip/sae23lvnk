<?php

include('../Vue/fonctions.php');
function newUsers(){

    $fp = fopen("../data/users.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    addUser('admin', 'bonjour', 'admin@gmail.com', '35', 'admin',1,'codesecret');
    addUser('Georges', 'bonjour', 'georges47@hotmail.com','974');
    addUser('Kono', 'bonjour', 'konolafripouilledu22@gmail.com','22','user',1,'Louis');
    addUser('hjeunecrack', 'bonjour', 'hjeune@crack.org','59','user',3,'moi');
    addUser('foret', 'bonjour', 'arbre@ecosia.tz','00', 'visitor',3,'Amazone');
    addUser('Emilie', 'bonjour', 'emilieflocon@laposte.net','44', 'admin',2,'Berlin');

}
newUsers();
echo "<pre>";
$json = file_get_contents('../data/users.json');
$user = json_decode($json, true);
print_r($user);
?>

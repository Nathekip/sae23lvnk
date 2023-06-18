<?php
function addUser($usr, $nom, $mdp, $mail, $departement, $role="visiteur",$question=0,$reponse=NULL){
  $user = array();
  $json = file_get_contents('../data/users.json');
  $user = json_decode($json, true);

  $add = array();
  $add['user']=$usr;
  $add['nom']=$nom;
  $add['mdp']=password_hash($mdp,PASSWORD_DEFAULT);
  $add['role']=$role;
  $add['mail']=$mail;
  $add['departement']=$departement;
  $add['question']=$question;
  $add['pp']=False;
  $add['reponse']=$reponse;
  $user[$add['user']]=$add;

  $jsonString = json_encode($user, JSON_PRETTY_PRINT);
  $fp = fopen("../data/users.json", 'w');
  fwrite($fp, $jsonString);
  fclose($fp);
}

function modUser($usr, $role, $mdp) {
  $json = file_get_contents('../data/users.json');
  $users = json_decode($json, true);

  if (isset($users[$usr])) {
      $users[$usr]['role'] = $role;
      if (!empty($mdp)) {
          $users[$usr]['mdp'] = password_hash($mdp, PASSWORD_DEFAULT);
      }

      $jsonString = json_encode($users, JSON_PRETTY_PRINT);
      file_put_contents('../data/users.json', $jsonString);
  }
}

function newUsers(){
  addUser("jgagnon","Josué Gagnon","bonjour","jgagnon@carfusion.com",25,"manager");
  addUser("mcourvoisier","Mathieu Courvoisier","bonjour","mcourvoisier@carfusion.com",37,"visiteur",1,"codesecret");
  addUser("pbouhier","Pascal Bouhier","bonjour","pbouhier@carfusion.com",95,"communication");
  addUser("aroatta","Amadou Roatta","bonjour","aroatta@carfusion.com",12);
  addUser("aregnard","Amaury Regnard","bonjour","aregnard@carfusion.com",07,"manager");
  addUser("aguillaume","Axelle Guillaume","bonjour","aguillaume@carfusion.com",35,"communication",1,"codesecret");
  addUser("cbonnot","Claudia Bonnot","bonjour","cbonnot@carfusion.com",44);
  addUser("vmarchant","Virginie Marchant","bonjour","vmarchant@carfusion.com",93,"manager");
  addUser("mcdeslys","Marie-Claude Deslys","bonjour","mcdeslys@carfusion.com",'2B',"employe",1,"codesecret");
  addUser("vgillet","Victor Gillet","bonjour","vgillet@carfusion.com",72,"admin",1,"codesecret");
  addUser("kgodefroy","Konogan Godefroy","bonjour","kgodefroy@carfusion.com",22,"admin",1,"codesecret");
  addUser("lcourteille","Louis Courteille","bonjour","lcourteille@carfusion.com",50,"admin",1,"codesecret");
  addUser("nguitton","Nathaniel Guitton","bonjour","nguitton@carfusion.com",44,"admin",1,"codesecret");
}

function readUser(){
  $user = array();
  $json = file_get_contents('../data/users.json');
  $user = json_decode($json, true);
  return $user;
}

function changePwd($usr, $mdp){
  $users = readUser();
  $users[$usr]['mdp'] = password_hash($mdp,PASSWORD_DEFAULT);
  $jsonString = json_encode($users, JSON_PRETTY_PRINT);
  $fp = fopen("../data/users.json", 'w');
  fwrite($fp, $jsonString);
  fclose($fp);  
}

function getEmail($usr=''){
  $users = readUser();
  foreach($users as $user){
    if ($user['user']==$usr){
      return $user['mail'];
    }
  }
  return '';
}

function getNom($usr=''){
  $users = readUser();
  foreach($users as $user){
    if ($user['user']==$usr){
      return $user['nom'];
    }
  }
  return '';
}

function deleteUser($usr){
  $user = readUser();
  unset($user[$usr]);
  $jsonString = json_encode($user, JSON_PRETTY_PRINT);
  $fp = fopen("../data/users.json", 'w');
  fwrite($fp, $jsonString);
  fclose($fp);
}

function ppTrue($usr){
  $users = readUser();
  $users[$usr]['pp']=True;
  $jsonString = json_encode($users, JSON_PRETTY_PRINT);
  $fp = fopen("../data/users.json", 'w');
  fwrite($fp, $jsonString);
  fclose($fp);
}

function ppFalse($usr){
  $users = readUser();
  $users[$usr]['pp']=False;
  $jsonString = json_encode($users, JSON_PRETTY_PRINT);
  $fp = fopen("../data/users.json", 'w');
  fwrite($fp, $jsonString);
  fclose($fp);
}
?>

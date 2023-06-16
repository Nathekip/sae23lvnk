<?php
function addUser($usr, $nom $mdp, $mail, $departement, $role="visiteur",$question=0,$reponse=NULL){
  $user = array();
  $json = file_get_contents('../data/users.json');
  $user = json_decode($json, true);

  $add = array();
  $add['user']=$usr;
  $add['nom']=nom;
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
  echo "test";
  $user = array();
  $json = file_get_contents('../data/users.json');
  $user = json_decode($json, true);
  return $user;
}
?>

<?php
function addUser($usr, $mdp, $mail, $departement, $role="user",$question=0,$reponse=NULL){
  $user = array();
  $json = file_get_contents('data/users.json');
  $user = json_decode($json, true);

  $add = array();
  $add['user']=$usr;
  $add['mdp']=password_hash($mdp,PASSWORD_DEFAULT);
  $add['role']=$role;
  $add['mail']=$mail;
  $add['departement']=$departement;
  $add['question']=$question;
  $add['pp']=False;
  $add['reponse']=$reponse;
  $user[$add['user']]=$add;

  $jsonString = json_encode($user, JSON_PRETTY_PRINT);
  $fp = fopen("data/users.json", 'w');
  fwrite($fp, $jsonString);
  fclose($fp);
}

function readUser(){
  $user = array();
  $json = file_get_contents('data/users.json');
  $user = json_decode($json, true);
  return $user;
}
?>

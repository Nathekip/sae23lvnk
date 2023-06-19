<?php

function getVoitures(){
    $json = file_get_contents('../data/voitures.json');
    $voitures = json_decode($json, true);
    return $voitures;
  }

function deleteVoiture($caracteristiques){
    $voitures = getVoitures();
    $n = -1;
    //print_r($caracteristiques);
    foreach($voitures["voitures"] as $index => $voiture){
        $n++;
        $marque = $voiture['marque'] == $caracteristiques[0];
        $modele = $voiture['modele'] == $caracteristiques[1];
        $annee = $voiture['annee'] == $caracteristiques[2];
        $prix = $voiture['prix'] == $caracteristiques[3];
        $etat = $voiture['etat'] == $caracteristiques[4];
        $kilometrage = $voiture['kilometrage'] == $caracteristiques[5];
        $couleur = $voiture['couleur'] == $caracteristiques[6];
        $carburant = $voiture['carburant'] == $caracteristiques[7];        
        $boite = $voiture['boite'] == $caracteristiques[8];
        if ($marque && $modele && $annee && $prix && $etat && $kilometrage && $couleur){
            //echo " True";
            //print_r($voiture);
            //print_r($voitures["voitures"][$n]);
            echo $n;
            unset($voitures["voitures"][$index]);
        }
    }
    $jsonString = json_encode($voitures, JSON_PRETTY_PRINT);
    $fp = fopen("../data/voitures.json", 'w');
    fwrite($fp, $jsonString);
    fclose($fp);    
    header("Location : ../Controleur/voiture02.php");
}
?>
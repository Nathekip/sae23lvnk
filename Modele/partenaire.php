<?php

function getPartenaire(){
    $json_data = file_get_contents('../data/partenaire.json');
    $partners = json_decode($json_data, true);
    return $partners;
}
function deletePartner($partnerName) {
    $json_data = file_get_contents('../data/partenaire.json');
    $partners = json_decode($json_data, true);

    foreach ($partners as $key => $partner) {
        if ($partner['nom'] === $partnerName) {
            // Supprimer la photo du partenaire du dossier images/partenaire
            $photoPath = '../images/partenaire/' . basename($partner['photo']);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            unset($partners[$key]);
            break;
        }
    }

    $updated_json_data = json_encode(array_values($partners), JSON_PRETTY_PRINT);
    file_put_contents('../data/partenaire.json', $updated_json_data);
}

function addPartenaire($nom, $description, $photo_destination){
    $partners = getPartenaire();

    $new_partner = [
        'nom' => $nom,
        'description' => $description,
        'photo' => $photo_destination
    ];

    $partners[] = $new_partner;

    $updated_json_data = json_encode($partners, JSON_PRETTY_PRINT);
    file_put_contents('../data/partenaire.json', $updated_json_data);
}


?>

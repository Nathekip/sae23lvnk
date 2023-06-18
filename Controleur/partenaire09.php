<?php 
include('../Vue/fonctions.php');
include('../Modele/partenaire.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    setup();
    if ( !isset($_SESSION['utilisateur'])){
    header("Location: ../Controleur/accueil01.php");
    }
    ?>
    <!--page responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    pagenavbar("p09");
    // Traitement du formulaire d'ajout de partenaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $photo = $_FILES['photo'];

        if ($photo['error'] === 0) {
            $photo_tmp = $photo['tmp_name'];
            $photo_destination = '../images/partenaire/' . $photo['name'];
            move_uploaded_file($photo_tmp, $photo_destination);

            $json_data = file_get_contents('../data/partenaire.json');
            $partners = json_decode($json_data, true);

            $new_partner = [
                'nom' => $nom,
                'description' => $description,
                'photo' => $photo_destination
            ];

            $partners[] = $new_partner;

            $updated_json_data = json_encode($partners, JSON_PRETTY_PRINT);
            file_put_contents('../data/partenaire.json', $updated_json_data);
        }
    }

    // Traitement de la suppression d'un partenaire
    if (isset($_POST['delete'])) {
        $partnerName = $_POST['delete'];
        deletePartner($partnerName);
    }

    // Affichage des partenaires existants
    $json_data = file_get_contents('../data/partenaire.json');
    $partners = json_decode($json_data, true);
    ?>

    <div class="container mt-5">
        <h2>Ajouter des partenaires</h2>
        <form method="post" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <br/>

            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" name="photo" id="photo" class="form-control-file" accept="image/png, image/jpeg, image/gif" required>
            </div>
            <br/>

            <button type="submit" class="btn btn-primary">Ajouter le partenaire</button>
        </form>

        <h2 class="mt-5">Liste des partenaires</h2>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($partners as $partner): ;?>
                    <tr>
                        <td><?php echo $partner['nom']; ?></td>
                        <td><?php echo $partner['description']; ?></td>
                        <td><img src="<?php echo $partner['photo']; ?>" width="100"></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="delete" value="<?php echo $partner['nom']; ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>

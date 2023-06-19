<?php
include('../Vue/fonctions.php');
include('../Modele/partenaire.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    setup();
    ?>
    <!--page responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    pagenavbar($page="");
    // Traitement du formulaire d'ajout de partenaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $photo = $_FILES['photo'];

        if ($photo['error'] === 0 && $photo['type'] === 'image/jpeg') {
            $photo_tmp = $photo['tmp_name'];
            $photo_name = $photo['name'];
            $photo_destination = '../images/partenaire/' . $photo_name;
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
                <label for="photo" class="custom-file-upload">
                    <input type="file" name="photo" id="photo" accept="image/jpeg" class="form-control-file" required>
                    <a class="btn btn-warning"> 
                        <i class="fa fa-cloud-upload"></i>
                        Choisir une photo
                    </a>
                </label>
            </div>
            <style>
            input[type="file"] {
            display: none;
            }
            </style>

            <br/>

            <button type="submit" class="btn btn-warning" style="color: white;">Ajouter le partenaire</button>
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
                        <td><?php echo htmlspecialchars($partner['nom']); ?></td>
                        <td><?php echo htmlspecialchars($partner['description']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($partner['photo']); ?>" width="100"></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="delete" value="<?php echo htmlspecialchars($partner['nom']); ?>">
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

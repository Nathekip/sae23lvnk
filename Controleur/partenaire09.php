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
</head>
<body>
    <?php
    pagenavbar($page="");
    // Traitement du formulaire d'ajout de partenaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $photo = $_FILES['photo'];

        if ($photo['error'] === 0) {
            $photo_tmp = $photo['tmp_name'];
            $photo_destination = '../images/partenaire/' . $photo['name'];
            move_uploaded_file($photo_tmp, $photo_destination);

            addPartenaire($nom,$description,$photo);
        }
    }

    // Traitement de la suppression d'un partenaire
    if (isset($_POST['delete'])) {
        $partnerName = $_POST['delete'];
        deletePartner($partnerName);
    }

    // Affichage des partenaires existants
    $partners = getPartenaire();
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

            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" name="photo" id="photo" class="form-control-file" required>
            </div>

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
                <?php foreach ($partners as $partner): ?>
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



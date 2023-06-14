<!DOCTYPE html>
<html>
<head>
    <title>Formulaire PHP</title>
</head>
<body>
    <?php
    session_start();
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer la valeur du champ de formulaire
        $_SESSION['role'] = $_POST["champ"];
        // Afficher la valeur
        echo "La valeur que vous avez entrée est : " . $valeur;
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="champ">Entrez une valeur :</label>
        <input type="text" name="champ" id="champ">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

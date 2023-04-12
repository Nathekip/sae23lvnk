<!DOCTYPE html>
<html>
<head>
    <?php
        include('fonctions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
    
<?php
        pageheader();
        echo pagenavbar("page02");

    ?>

    <form action="page02.php" method="post">

        <label for="cars">Choix :</label>
        <br>
        <input type="checkbox" id="Auteur" name="author" value="true" onclick="showInput()">
        <label for="Auteur"> : Auteur</label><br>

        <input type="checkbox" id="Titre" name="title" value="true" onclick="showInput()">
        <label for="Titre"> : Titre</label><br>

        <div id="textInput" style="display:none">
            <label for="texte"> Recherche : </label>
            <input type="text" name="keyword" id="texte" style="padding-left: 10px;" required>
        </div>

        <br><br>

        <input type="submit" value="Rechercher">
    </form>

    <script>
        function showInput() {
            var textInput = document.getElementById("textInput");
            var searchAuteur = '';
            var searchTitre = '';

            if (document.getElementById("Auteur").checked) {
                searchAuteur = "auteur";
            }

            if (document.getElementById("Titre").checked) {
                searchTitre = "titre";
            }

            if (document.getElementById("Auteur").checked || document.getElementById("Titre").checked) {
                textInput.style.display = "block";
            } else {
                textInput.style.display = "none";
            }
        }
    </script>

<?php
            $fields = array();
            if ($_POST['author']='true'){array_push($fields,'author');}
            if ($_POST['title']='true'){array_push($fields,'title');}
            $keyword = $_POST['keyword'];
            $json = file_get_contents('data/data.json');
            $livres = json_decode($json, true);
            findbooks($livres, $keyword, $fields);
            $json = file_get_contents('data/test.json');
            $livres = json_decode($json, true);
            echo showbooks($livres);
            pagefooter();
?>
</body>
</html>
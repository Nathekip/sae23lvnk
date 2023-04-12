<!DOCTYPE html>
<html>
<head>
    <?php
        include('functions.php');
        setup();
    ?>
  <meta charset="UTF-8">
</head>
<body>
    
<?php
        pageheader();
        echo pagenavbar("p02");

    ?>

   
<form class="row" action="page02.php" method="post">
  <div class="form-group col-sm-2">
    <label>Choix :</label><br>
    <div class="form-check">
      <input type="checkbox" id="Auteur" name="author" value="true" class="form-check-input">
      <label for="Auteur" class="form-check-label"> Auteur</label><br>
    </div>
    <div class="form-check">
      <input type="checkbox" id="Titre" name="title" value="true"   class="form-check-input">
      <label for="Titre" class="form-check-label"> Titre</label><br>
    </div>
  </div>
  <div class="form-group col-sm-2">
    <div>
      <div id="textInput">
        <label for="texte">Recherche :</label>
        <input type="text" name="keyword" id="texte" class="form-control">
      </div>
    </div>
    <div>
      <input type="submit" value="Rechercher" class="btn btn-primary">
    </div>
  </div>
</form>




<?php
$fields = array();
if (isset($_POST['author'])){
    array_push($fields,'author');
}
if (isset($_POST['title'])){
    array_push($fields,'title');
}
if ($fields == []){
    $fields = ["id","title","content","author","date"];
}
$json = file_get_contents('data/data.json');    
if (isset($_POST['keyword'])){
$keyword = $_POST['keyword'];
$livres = json_decode($json, true);
findbooks($livres, $keyword, $fields);
$json = file_get_contents('data/test.json');}
$livres = json_decode($json, true);
echo showbooks($livres);
pagefooter();
?>
</body>
</html>
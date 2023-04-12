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
    <?php pageheader(); ?>
    <?php echo pagenavbar("p04"); ?>
    <main>
      <div class="container text-center center py-3">
        <h2 class="mb-3">Formulaire</h2>
          <p>Le formulaire comporte deux checkbox et un champ input ainsi qu'un bouton submit.<br>
          Le champ input permet à l'utilisateur de renseigner le mot ou en tout cas la chaine de caractère qu'il/elle veut chercher dans la liste de livres.<br>
          Les deux checkbox permettent de spécifier les champs dans lesquels la recherche aura lieu : 
            <ul>
            <li class="list-group-item"><strong>Case "Auteur" cochée :</strong> Champ "Auteur"</li>
            <li class="list-group-item"><strong>Case "Titre" cochée :</strong> Champ "Titre"</li>
            <li class="list-group-item"><strong>Cases "Auteur" et "Titre" cochée :</strong> Champs "Auteur" et "Titre"</li>            
            <li class="list-group-item"><strong>Aucune case cochée :</strong> Tous les champs</li>
            </ul>
            Le bouton submit permet de lancer la recherche
        </p>
        <div class="mt-5">
          <h3>Cas limites et particularités à tester:</h3>
          <p>Lorsqu'un livre contient le keyword dans plusieurs de ses champs, il pourrait être décompté plusieurs fois, et affiché plusieurs fois.<br>
        On ne compte donc dans la recherche que les livres qui n'ont pas encore été trouvés.</p>
          
        </div>
        <div class="mt-5">
          <h3>Traitements apportés aux données:</h3>
          <p>Une fois les livres inventoriés par le processus de recherche, on les trie par ID grâce à la fonction usort.</p>
        </div>
      </div>
    </main>
    <?php pagefooter(); ?> </body>

</html>
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
        echo pagenavbar("p01");
        echo "<br><img class='rounded mx-auto d-block' centered' src='images/front.jpg' alt='Librairie'><br>";
        echo "<br><div class='container mx-auto'>
        <p>Une bibliothèque (du grec ancien βιϐλιοθήκη : biblio, « livre » ; thêkê, « dépôt ») est un lieu où l'on conserve une collection organisée de livres et matériels de référence. Il existe des bibliothèques privées — y compris de riches bibliothèques ouvertes au public — des bibliothèques publiques, et des bibliothèques spécialisées entre autres. Les bibliothèques proposent souvent d'autres documents (journaux, périodiques, enregistrements sonores, enregistrements vidéo, cartes et plans, partitions) ainsi que l'accès à internet. Parfois les bibliothèques sont appelées médiathèques.

        La majorité des bibliothèques (municipales, universitaires) permettent la consultation sur place ainsi que le prêt de documents. D'autres, comme la Bibliothèque publique d'information et la bibliothèque nationale de France notamment, n'autorisent que la consultation sur place. Elles peuvent alors être divisées en salles de lectures, ouvertes au public, et en magasins de bibliothèque (qui sont souvent des rangs fermés), pour le stockage de livres moins consultés. D'autres espaces, ouverts ou non au public, peuvent s'ajouter.
        
        En 2010, avec plus de 144,5 millions de documents, dont 21,8 millions de livres, la plus grande bibliothèque du monde est la bibliothèque du Congrès à Washington D.C.. Néanmoins, la collection cumulée de livres des deux bibliothèques nationales russes atteint 32,5 millions de volumes et la collection de la British Library 150 millions d'articles. D'après l'Organisation des Nations unies pour l'éducation, la science et la culture1 la plus vieille bibliothèque du monde encore en activité est la bibliothèque Al Quaraouiyine de Fès au Maroc, elle renferme quatre mille manuscrits d'une valeur inestimable ayant appartenu à des scientifiques universels comme le géographe Al Idrissi, le botaniste Al-Ghassani, ou encore le médecin Avenzoar.
        </div></p><br>";
        
        pagefooter();
    ?>
</body>
</html>

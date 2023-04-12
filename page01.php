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
        echo pagenavbar("page01");
        echo "<br><img class='rounded mx-auto d-block' centered' src='images/front.jpg' alt='Librairie'><br>";
        pagefooter();
    ?>
</body>
</html>

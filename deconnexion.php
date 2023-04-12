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
echo "<pre>";
print_r($_POST);
session_unset();
header('Location: page01.php');
?>
</body>
</html>


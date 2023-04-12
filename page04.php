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
    <?php pageheader(); ?>
    <?php echo pagenavbar("page04"); ?>
    <main>
      <div class="container text-center center py-3">
        <h2 class="mb-3">Formulaire</h2>
        <p>Utilisez ce formulaire pour saisir des informations sur un livre:</p>
        <div class="mt-5">
          <h3>Cas limites et particularités à tester:</h3>
          
        </div>
        <div class="mt-5">
          <h3>Traitements apportés aux données:</h3>
          <p>Les données saisies dans le formulaire sont validées avant d'être traitées:</p>
          <ul>
            <p>Le titre est vérifié pour être unique et ne doit pas dépasser 100 caractères.</p>
            <p>L'auteur ne doit pas dépasser 50 caractères.</p>
            <p>Le résumé ne doit pas dépasser 1000 caractères.</p>
            <p>Les données sont protégées contre les attaques CSRF.</p>
          </ul>
        </div>
      </div>
    </main>
    <?php pagefooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Jjl/uQ/IHD9+rj7z+r8m6pyNFsVn00C6hBldQsPMq3/70+VZ+X9nT7hWGp/DSPwB" crossorigin="anonymous"></script>
  </body>

</html>
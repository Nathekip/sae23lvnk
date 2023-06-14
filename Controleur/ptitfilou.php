<!DOCTYPE html>
<html>
<head>
    <title>Formulaire PHP</title>
    <?php
    include('../Vue/fonctions.php');
    setup();
    ?>
</head>
<body>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer la valeur du champ de formulaire
        $_SESSION['role'] = $_POST["champ"];
        // Afficher la valeur
        echo "La valeur que vous avez entrée est : " . $_SESSION['role'];
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="champ">Entrez une valeur :</label>
        <input type="text" name="champ" id="champ">
        <input type="submit" value="Envoyer">
    </form>

    <button type="button" class="btn btn1 btn-outline-custom" data-bs-toggle="modal" data-bs-target="#myModal">
        Connexion
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <!-- Modal Header -->
                <div class="modal-header bg-secondary text-center">
                    <h4 class="modal-title text-white mx-auto">Connexion</h4>
                    <button type="button" class="btn-close bg-danger btn-outline-dark btn-close-modal" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body text-center">
                    <div class="container-fluid text-center py-3 d-flex justify-content-between align-items-center bg-white">
                        <div class="d-flex align-items-center mx-auto">
                            <div class="login-form">
                                <form id="login-form" method="post">
                                    <div class="pt-3 form-group">
                                        <label>Utilisateur</label>
                                        <input type="text" class="form-control" name="utilisateur" placeholder="Utilisateur">
                                    </div>
                                    <div class="pt-3 form-group">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe">
                                        <input type="hidden" name="page" value="accueil01">
                                    </div>
                                    <div class="pt-4">
                                        <button type="submit" class="btn text-white btn-dark btn-outline-success btn-login" id="submitBtn">Se connecter</button>
                                    </div>
                                </form>
                                <div class="pt-2 d-flex text-primary justify-content-between w-100 m-2 mt-3">
                                    <div><a href="creerprofil5.php">Pas de profil</a> ?</div>
                                    <div><a href="oublimdp6.php">Mot de passe oublié</a> ?</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark text-white btn-outline-danger btn-close-modal" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
            <div class="container" id="alerte">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("login-form");
            var modal = document.getElementById("myModal");
            var loginButton = document.querySelector("#login-form button.btn-login");
            form.addEventListener("submit", function(e) {
                e.preventDefault(); // Empêcher le rechargement de la page
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../Vue/process.php", true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var alerteDiv = document.getElementById("alerte");
                        alerteDiv.innerHTML = xhr.responseText;
                        alerteDiv.style.display = "block";
                        $(modal).modal("handleUpdate"); // Actualiser le modal après la soumission du formulaire
                        if (xhr.responseText.indexOf("Erreur") === -1) {
                            window.location.assign('<?php echo basename($_SERVER['PHP_SELF']); ?>');
                        }
                    }
                };
                xhr.send(formData);
            });
            modal.addEventListener("hidden.bs.modal", function() {
                var form = document.getElementById("login-form");
                form.reset(); // Effacer les champs du formulaire
                var alerteDiv = document.getElementById("alerte");
                alerteDiv.innerHTML = ""; // Supprimer le contenu du message d'erreur
                alerteDiv.style.display = "none"; // Masquer le message d'erreur
            });

        });
    </script>

    <?php
    if (isset($_POST['page'])) {
        echo "<div class='container'>
                  <div class='alert alert-danger'>
                      <strong>Erreur</strong> Le mot de passe ou l'identifiant sont invalides.
                  </div>
              </div>";
    }
    pr();
    ?>
</body>
</html>

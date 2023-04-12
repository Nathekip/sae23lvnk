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
        echo pagenavbar("p08"); ?>
        <div class="container mt-3">
        <h2>Fonctionnalités du site web</h2>
        <p><strong>Avertissement:</strong> Ceci est une liste <strong>non-exhaustive</strong> des fonctionnalités de ce site web.</p>
<div id="accordion">
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="btn text-white text-center d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseOne">
                Commun à toutes les pages
            </a>
        </div>
        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-primary text-black text-center">
                <strong>Header :</strong>
                <br>Logo Biblionet qui renvoie à la page d'accueil
                <br>Affichage "Vous n'êtes pas connectés" et bouton "connexion" si l'user n'est pas encore connecté
                <br>Affichage *Pseudo de l'user* et bouton "déconnexion" si l'user est connecté
                <hr><strong>Bouton de connexion :</strong>
                <br>Renvoie vers une page comportant un formulaire de connexion
                <br>Le formulaire permet à l'utilisateur de se connecter si et seulement si son mot de passe est bon
                <br>Après connexion, l'utilisateur est redirigé vers la page d'accueil
                <br>Si le mot de passe ou l'identifiant sont erronés, il y a un message (image) d'erreur qui permet de retourner au formulaire de connexion
                <hr><strong>Bouton de deconnexion :</strong>
                <br>Supprimme la session et redirige vers la page d'accueil
                <hr><strong>Navbar interactive :</strong>
                <br>Affiche les pages "Page d'accueil","Formulaire","Informations" et "Fonctionnalités" par défaut
                <br>Affiche la page "Mon Profil" quand l'utilisateur est connecté
                <br>Affiche les pages "Fichiers" et "Administrer" quand le rôle de l'utilisateur est 'admin'
                <br>La page sur laquelle se situe l'utilisateur est mise en avant
                <hr><strong>Footer :</strong>
                <br>Affiche des informations utiles          
                <br>Reste au même endroit sur l'écran lorsqu'on scrolle
             </div>
        </div>
    </div>
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="collapsed btn text-white d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseTwo">
                Page d'Accueil
            </a>
        </div>
        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-info text-black text-center">
                <strong>Corps de page :</strong>
                <br>Image de bibliothèque
                <br>Texte issu de wikipédia
            </div>
        </div>
    </div>
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="collapsed btn text-white d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseThree">
            Formulaire
            </a>
        </div>
        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-warning text-black text-center">
                <strong>Formulaire :</strong>
                <br>Boutons checkbox "auteur" et "titre"
                <br>Champ de recherche de type input
                <br>Bouton envoyer
                <hr><strong>Tableau :</strong>
                <br>Affichage du fichier json data.json dans un tableau
                <br>Fonctionnalités de la page détaillées plus précisément sur la page "Informations"
            </div>
        </div>
    </div>
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="collapsed btn text-white d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseFour">
            Informations
            </a>
        </div>
        <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-danger text-black text-center">
                <strong>Corps de page :</strong>
                <br>Texte précisant les fonctionnalités du formulaire en page 2
            </div>
        </div>
    </div>
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="collapsed btn text-white d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseFive">
            Fichiers
            </a>
        </div>
        <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-warning text-black text-center">
                <strong>Corps de page :</strong>
                <br>print_r des données contenu dans le json servant de base de donnée (contenant les 25 livres de la bibliothèque)
            </div>
        </div>
    </div>
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="collapsed btn text-white d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseSix">
            Administrer
            </a>
        </div>
        <div id="collapseSix" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-info text-black text-center">
                <strong>Formulaire "Chercher un utilisateur" :</strong>
                <br>Champs de recherche contenant le pseudo à chercher
                <br>Bouton d'envoi du formulaire, déclenchant la fonction findUser()
                <br>Les données d'utilisateurs correspondant à la recherche sont placées dans le fichier finduser.json
                <hr><strong>Tableau d'affichage des utilisateurs :</strong>
                <br>Affiche les pseudos des user et leur rôle
                <br>Affiche les user contenus dans le fichier finduser.json si une recherche a eu lieu, contenus dans le fichier users2.json s'il n'y a pas eu de recherche ou si la barre de recherche est vide lorsqu'on appuie sur le bouton d'envoi du formulaire
                <br>Un mini-formulaire composés de deux champs 'input' "mot de passe" et "confirmer mot de passe" ainsi que d'un bouton submit
                <br>Bouton pour effacer un utilisateur (en appelant la fonction deleteUser())
                <br>On ne peut supprimer un user que si on est admin
                <hr><strong>Formulaire "Ajouter un utilisateur" :</strong>
                <br>Champs de recherche "pseudo", "mot de passe" et "confirmer le mot de passe"
                <br>Bouton dropdown servant à séléctionner le rôle
                <br>Bouton d'envoi du formulaire, déclenchant la fonction addUser()
                <br>On ne peut ajouter un user que si on est admin
            </div>
        </div>
    </div>
    <div class="bg-secondary text-white card border-0">
        <div class="card-header">
            <a class="collapsed btn text-white d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseSeven">
            Mon Profil
            </a>
        </div>
        <div id="collapseSeven" class="collapse" data-bs-parent="#accordion">
            <div class="card-body bg-primary text-black text-center">
                <strong>Corps de page :</strong>
                <br>Card bootstrap affichant les informations de l'user connecté
                <br>Jolie image de profil
                <br>Nom de l'user affiché en grand
                <br>Petite phrase informant du rôle de l'user
                <br>Bouton pour changer la photo de profil (ce bouton ne fonctionne pas, il n'agit que sous forme de décoration ou de porte vers ce que le site pourrait être, avec un peu d'imagination)
            </div>
        </div>
    </div>





</div>
</div>
<br>



        
<?php
pagefooter();
    ?>
</body>
</html>

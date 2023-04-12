<?php
function setup() {
    session_start();
    echo '<link rel="icon" href="images/logo.png">';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>';

    $nomFichier = basename($_SERVER["SCRIPT_NAME"], ".php");
    switch ($nomFichier) {
        case "page01":
            echo "<title>Page d'accueil</title>";
            break;
        case "page02":
            echo '<title>Formulaire</title>';
            break;
        case "page04":
            echo '<title>Informations</title>';
            break;
        case "page05":
            echo '<title>Fichiers</title>';
            break;
        case "page06":
            echo '<title>Administrer</title>';
            break;
        case "page07":
            echo '<title>Mon Profil</title>';
            break;
        case "page08":
            echo '<title>Fonctionnalités</title>';
            break;
        default:
            echo '<title>Biblionet</title>';
            break;
    }
}

function pageheader() {
    echo '<header>';
    echo '<div class="container-fluid bg-info text-center py-3 d-flex justify-content-between align-items-center">';
    echo '<div class="d-flex align-items-center mx-auto">';
    echo "<a href='page01.php'><img class='rounded mr-3' src='images/logo.png' alt='logo'></a>";
    echo '<h1 class="mb-0 flex-fill text-center">Biblionet</h1>';
    echo '</div>';
    if(isset($_SESSION['utilisateur'])){
        echo $_SESSION['utilisateur'];
        echo "<a href='deconnexion.php' class='btn btn-warning btn-sm'>Se déconnecter</a>";
    }
    else {  
        echo "Vous n'êtes pas connectés";
        echo "<a href='connexion.php' class='btn btn-warning btn-sm'>Connexion</a>";
    }
    echo '</div>';
    echo '</header>';
  }
  







function pagenavbar($pageactive){
    $pages = ["p01","p02","p04","p05","p06","p07","p08"];
    $navbarprofil = <<<EOD
                <li class="nav-item">
                    <a class="nav-link p07" href="page07.php">Mon Profil</a>
                </li>
                EOD;
    $navbaradmin = <<<EOD
                <li class="nav-item">
                    <a class="nav-link p05" href="page05.php">Fichiers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p06" href="page06.php">Administrer</a>
                </li>
                EOD;
    $navbar = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link p01" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p02" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p04" href="page04.php">Informations</a>
                </li>
                navbaradmin
                profil
                <li class="nav-item">
                    <a class="nav-link p08" href="page08.php">Fonctionnalités</a>
                </li>
            </ul>
            </nav>
    EOD;
    if(isset($_SESSION['utilisateur'])){
        $navbar = str_replace('profil',$navbarprofil,$navbar);
        if($_SESSION['role']=='admin'){
            $navbar = str_replace('navbaradmin',$navbaradmin,$navbar);        
        }
        else{
            $navbar = str_replace('navbaradmin','',$navbar);
        }       
    }
    else{
        $navbar = str_replace('profil','',$navbar);
        $navbar = str_replace('navbaradmin','',$navbar);
    }
    foreach($pages as $p){
        if($p==$pageactive){
            $navbar= str_replace($p,"active",$navbar);
        }
        else{
            $navbar= str_replace($p,"",$navbar);
        }
    }

    return $navbar;
}

  function showbooks($livres){
    echo "<br>";
    $tab = array();
    $rep = "";
    $rep .= <<<EOD
    
                <div class="container">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Résumé</th>
            <th scope="col">Auteur</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
    EOD;
    
    $n=0;
    foreach($livres as $l){
        #print_r($l);
        #echo "<br>";
        
    
        $tab[$n] = <<<EOD
            <tr>
            <th scope="row">identifiant</th>
            <td>title</td>
            <td>content</td>
            <td>author</td>
            <td>date</td>
            </tr>
        EOD;
        $tab[$n]= str_replace("identifiant",$l['id'],$tab[$n]);
        $tab[$n]= str_replace("title",$l['title'],$tab[$n]);
        $tab[$n]= str_replace("content",$l['content'],$tab[$n]);
        $tab[$n]= str_replace("author",$l['author'],$tab[$n]);
        $tab[$n]= str_replace("date",$l['date'],$tab[$n]);
        $rep .= $tab[$n];
        $n++;
    
    }
    
    $tabfin = <<<EOD
            </tbody>
    </table>
    </div>
    EOD;
    $rep .= $tabfin;
    return $rep;


}
  function pagefooter() {
    echo "<br><br><br>";
    echo '<footer class="bg-secondary text-light fixed-bottom">';
    echo '<div class="container-fluid text-center">';
    echo '<p class="mb-0">Nathaniel GUITTON</p>';
    echo '<p class="mb-0">IUT St-Malo, Réseaux et Télécoms</p>';
    echo '<p class="mb-0">© Infos et Mentions légales, Politique de Confidentialité, Conditions Générales</p>';
    echo '</div>';
    echo '</footer>';
}

function findbooks($livres,$keyword, $fields=[]){
    $rep = array();
    if ($fields== []){
        $fields = ["id","title","content","author","date"];
    }
    for($i=0;$i<count($fields);$i++){
        foreach($livres as $l){
            foreach ($l as $key => $value){      
                if (strpos($value, $keyword) !== false) {
                    if (($key == $fields[$i]) && ((in_array($l,$rep))==false)){
                        array_push($rep,$l);
                        }
                    }   
                }
            }
        }
    usort($rep, function($a, $b) {
        return $a['id'] - $b['id'];
    });
        

    $fp = fopen("data/test.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($rep);
    $fp = fopen("data/test.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function showusers($user){
    $tab = array();
    $rep = <<<EOD
    
    <div class="container">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">user</th>
            <th scope="col">role</th>
            <th scope="col">Nouveau mdp</th>
            <th scope="col">Confirmation</th>
            <th scope="col">Valider</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
    EOD;
    
    $n=0;
    foreach($user as $u){
        #print_r($l);
        #echo "<br>";
        
    
        $tab[$n] = <<<EOD
            <tr>
            <th scope="row">user</th>
            <td>role</td>
        
            <form action="pwdbtn.php" method="post">
            <td><input type="password" class="form-control" id="mdp" placeholder="mdp" name="mdp"></td>
            <td><input type="password" class="form-control" id="cmdp" placeholder="mdp" name="cmdp"></td>
            <td>
            <button type="submit" class="btn btn-success" name="user">
            <img class='rounded mb-auto d-block' centered src='images/check.png' alt='logo'>
            </button>
            </form>
            </td>

            <td><form action="delbtn.php" method="post">
            <button type="submit" class="btn btn-danger" name="user">
                  <img class='rounded mb-auto d-block' centered src='images/cancel.png' alt='logo'>
                  </button>
            </form></td>
            </tr>
        EOD;
        $tab[$n]= str_replace("user",$u['user'],$tab[$n]);
        $tab[$n]= str_replace("role",$u['role'],$tab[$n]);
        $rep .= $tab[$n];
        $n++;
    
    }
    
    $tabfin = <<<EOD
            </tbody>
    </table>
    </div>
    EOD;
    $rep .= $tabfin;
    return $rep;


}


function addUser($usr, $mdp, $role="user"){
    $user = array();
    $json = file_get_contents('data/users2.json');
    $user = json_decode($json, true);

    $add = array();
    $add['user']=$usr;
    $add['mdp']=password_hash($mdp,PASSWORD_DEFAULT);
    $add['role']=$role;
    $user[$add['user']]=$add;

    $fp = fopen("data/users2.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users2.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function deleteUser($usr){
    $json = file_get_contents('data/users2.json');
    $user = json_decode($json, true);

    unset($user[$usr]);

    $fp = fopen("data/users2.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($user, JSON_PRETTY_PRINT);
    $fp = fopen("data/users2.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

function findUser($usr){
    $json = file_get_contents('data/users2.json');
    $user = json_decode($json, true);
    $find = array();

    foreach($user as $u){
        $a = strtoupper($u['user']);
        $b = strtoupper($usr);
        if(strpos($a,$b) !== false){
            array_push($find,$u);
        }
    }
    $fp = fopen("data/finduser.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($find, JSON_PRETTY_PRINT);
    $fp = fopen("data/finduser.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);

}

?>

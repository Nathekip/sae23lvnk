<?php
function setup() {
    echo '<link rel="icon" href="images\icone.png">';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
    $nomFichier = basename($_SERVER["SCRIPT_NAME"], ".php");
    switch ($nomFichier) {
        case "page01":
            echo '<title>Page 1</title>';
            break;
        case "page02":
            echo '<title>Page 2</title>';
            break;
        case "page04":
            echo '<title>Page 4</title>';
            break;
        case "page05":
            echo '<title>Page 5</title>';
            break;
        default:
            echo '<title>Page ?</title>';
            break;
    }
}
function pageheader() {
    echo '<header>';
    echo '<div class="container-fluid bg-light text-center py-3">';
    echo '<h1>Mon site web</h1>';
    echo '<button class="btn btn-primary" id="connexion" onclick="">Connexion</button>';
    echo '</div>';
    echo '</header>';
}
function pagenavbar($pageactive){
    $navbar = array();
    $navbar['page01'] = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page04.php">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page05.php">Fichiers</a>
                </li>
            </ul>
            </nav>
    EOD;
    $navbar['page02'] = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page04.php">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page05.php">Fichiers</a>
                </li>
            </ul>
            </nav>
    EOD;
    $navbar['page04'] = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="page04.php">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page05.php">Fichiers</a>
                </li>
            </ul>
            </nav>
    EOD;
    $navbar['page05'] = <<<EOD
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="page01.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page02.php">Formulaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page04.php">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="page05.php">Fichiers</a>
                </li>
            </ul>
            </nav>
    EOD;



    return $navbar[$pageactive];
}

  function showbooks($livres){
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
    echo '<footer class=" text-dark">';
    echo '<div class="container-fluid text-center">';
    echo '<p class="mb-0">Prenom Nom</p>';
    echo '<p class="mb-0">IUT De Saint Malo Réseaux et Télécommunications</p>';
    echo '<p class="mb-0">© Infos et Mentions légales, Politique de Confidentialité, Conditions Générales</p>';
    echo '</div>';
    echo '</footer>';
}

function findbooks($livres,$keyword, $fields=[]){
    $rep = array();

    for($i=0;$i<count($fields);$i++){
        foreach($livres as $l){
            foreach ($l as $key => $value){      
                
                if (strpos($value, $keyword) !== false) {
                    if ($key == $fields[$i]) {
                        array_push($rep,$l);
                    }   
                }
            }
        }
    }

    $fp = fopen("data/test.json", 'w');
    fwrite($fp, "");
    fclose($fp);

    $jsonString = json_encode($rep);
    $fp = fopen("data/test.json", 'a');
    fwrite($fp, $jsonString);
    fclose($fp);
}

?>
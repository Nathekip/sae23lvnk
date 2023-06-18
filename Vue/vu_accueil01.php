<?php
include('../Modele/partenaire.php');

function arrive(){
    echo <<<EOD
        <div class="position-relative">
        <div class="position-absolute bg-gradient-primary text-white border-0 rounded-0 p-3 w-100 d-flex align-items-center justify-content-center" style="top: 25%">
            <div class="position-relative text-center">
            <h1 class="text-white text-uppercase fw-bold mb-4 text-shadow" style="text-shadow: 0 0 10px black;">Bienvenue chez CarFusion</h1>
            <h2 class="text-white text-uppercase fw-bold text-shadow" style="text-shadow: 0 0 10px black;">Heureux de vous voir ici !</h2>
            </div> 
        </div>
        <img src="../images/banniere.png" alt="Bannière" class="w-100">
        </div>
    
    
        <div class="container">
        <br><br>
        <div class="border-top border-dark border-3 my-1"></div>
        </div>
        <br><br><br>
        <h2 class="fw-bold text-uppercase text-center">Evolution de l'entreprise *</h2>
        <br>
    EOD;
}

function timeline(){
    echo <<<EOD
        <div class="horizontal-timeline">
        <div class="container-fluid py-4">
            <div class="row">
            <div class="col-lg-12">
                <div class="horizontal-timeline">
                <ul class="text-center">
                    <li class="d-inline-flex">
                    <div>
                        <div class="event-date badge bg-info position-absolute" style="height: 2.8%; left: 9.7%">
                        <h7 onclick="movevoiturebleue()">18 Mars 2019</h7>
                        </div>
                    </div>
                    </li>
                    <li class="d-inline-flex">
                    <div>
                        <div class="event-date badge bg-success position-absolute" style="height: 2.8%; left: 33.5%">
                        <h7 onclick="movevoitureverte()">20 Août 2019</h7>
                        </div>
                    </div>
                    </li>
                    <li class="d-inline-flex">
                    <div class="">
                        <div class="event-date badge bg-danger position-absolute" style="height: 2.8%; left: 57.5%">
                        <h7 onclick="movevoiturerouge()">14 Juin 2020</h7>
                        </div>
                    </div>
                    </li>
                    <li class="d-inline-flex">
                    <div>
                        <div class="badge bg-warning position-absolute" style="height: 2.8%; left: 81.5%">
                        <h7 onclick="movevoiturelogo()">15 Mai 2023</h7>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
    
    
    
        <div class="horizontal-timeline">
        <img src="..\images\piste.png" alt="Route" class="position-absolute w-100" style="height: 6%; left: 0%">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                <div class="horizontal-timeline">
                <img id="Voiture Bleue" src="../images/voiture-bleue.png" alt="Voiture Bleue" class="position-absolute" style="width: 5%; height: 6%">
                <img id="Voiture Verte" src="../images/voiture-verte.png" alt="Voiture Verte" class="position-absolute" style="width: 7%; height: 6%; display: none">
                <img id="Voiture Rouge" src="../images/voiture-rouge.png" alt="Voiture Rouge" class="position-absolute" style="	width: 8%; height: 6%; display: none">
                <img id="Voiture Logo" src="../images/voiture-logo.png" alt="Voiture Logo" class="position-absolute" style="	width: 8%; height: 6%; display: none">
                </div>
            </div>
            </div>
        </div>
        </div>
    
        <div class="horizontal-timeline">
        <div class="container-fluid py-5">
            <div class="row">
            <div class="col-lg-12">
                <div class="horizontal-timeline">
                <ul class="text-center">
                    <li class="d-inline-flex">
                        <div><br>
                            <h5 class="position-absolute" style="left: 10.1%">Création</h5><br><br>
                            <p class="position-absolute text-muted" style="left: 2.5%; max-width: 20%"> Ouverture de la première boutique à Saint-Malo, cité balnéaire bretonne. Le magasin est neuf et ses dirigeants sont motivés.</p>
                        </div>
                    </li>
                    <li class="d-inline-flex">
                        <div><br>
                            <h5 class="position-absolute" style="left: 32.8%">1 000 Ventes</h5><br><br>
                            <p class="position-absolute text-muted" style="left: 26.5%; max-width: 20%">Entre stratégie commerciale et communication, les premières ventes arrivent très vite. CarFusion atteint le premier palier symbolique de la millième vente en moins de six mois.</p>
                        </div>
                    </li>
                    <li class="d-inline-flex">
                        <div><br>
                            <h5 class="position-absolute" style="left: 57%">2<SUP>e</SUP> boutique</h5><br><br>
                            <p class="position-absolute text-muted" style="left: 51%; max-width: 20%">Après la pandémie et le confinement, notre équipe décide de s'étendre à destination de Rennes. Notre nouvelle boutique est plus grande et accueille de nouveaux clients chaque jour. </p>
                        </div>
                    </li>
                    <li class="d-inline-flex">
                        <div><br>
                            <h5 class="position-absolute" style="left: 80%">100 000 Ventes</h5><br><br>
                            <p class="position-absolute text-muted" style="left: 75%; max-width: 20%">En quatre ans, CarFusion a su se créer une réputation et une image de marque de qualité. Les retours clients positifs et nombreux ont permis l’achèvement de la cent-millième vente. </p>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
            </div>
            <br><br><br><br><br><br><br>
            <h8 class="position-absolute" style="max-width: 22%">* Cliquez sur les dates pour voir les animations</h8>
        </div>
        </div>
        <div>
        <div class="container">
            <br><br>
            <div class="border-top border-dark border-3 my-1"></div>
        </div>
        <br><br><br>
    EOD;
}

function presentation(){
    echo <<<EOD
        <h2 class="fw-bold text-uppercase text-center">Qui et où sommes nous ?</h2>
        <br><br><br>
        <img src="..\images\carte.png" alt="Carte" class="mx-auto d-block" style="width: 35%">
        <br><br><br>
        <div class="position-relative text-dark border border-3 border-dark rounded-0 p-3 w-75 h-75" style="left: 12.5%; text-align: justify">
        <p class="text-dark">CarFusion, comme son nom l’indique, est une entreprise fondée autour de l’automobile.<br><br>
            À son origine, nous avions un garage en plein cœur de Saint-Malo en Bretagne. Notre équipe était formée de quatre étudiants passionnés de voitures, depuis leur plus jeune âge, et qui voulaient travailler ensemble. Ces étudiants sont quatre co-fonfdateurs de l'entreprise, Louis Courteille, Victor Gillet, Konogan Godefroy et Nathaniel Guitton.<br><br>
            Des années de persévérance et de travail acharné, ont permis la création de ce que nous sommes devenus aujourd’hui.<br><br>
            Depuis le 18 mars 2019, l'équipe de CarFusion se focalise sur vos besoins et tente de vous offrir une expérience unique.<br><br>
            En quatre ans, notre nombre de boutiques et points de ventes n'a cessé d'augmenter en France. Cette expansion à l'échelle nationale est le résultat de retours positifs et de perpétuelles évolutions.<br><br>
            Aujourd’hui, vous trouverez au sein de nos différents points de vente la voiture qui vous correspond. Nos agents seront présents pour vous aider dans vos recherches.<br><br>
            Notre site internet est l’outil qu’il vous faut. Fonctionnel, adapté et à jour, il répertorie la sélection des véhicules mise à disposition dans nos magasins.
        </p>
        </div>
        </div>
        <div class="container">
        <br><br><br><br>
        <div class="border-top border-dark border-3 my-1"></div>
        </div>
        <br><br><br>
    EOD;
}

function services(){
    echo <<<EOD
        <section class="page-section" id="services">
        <div class="container">
            <h2 class="fw-bold text-uppercase text-center">Services</h2>
            <br><br><br>
            <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-warning"></i>
                <i class="fa fa-shopping-cart fa-stack-1x"></i>
                </span>
                <h4 class="my-3">Vente</h4>
                <p class="text-muted">Le premier service de CarFusion est la vente. Nos différentes boutiques et points de vente vous proposent des véhicules qui répondent à vos besoins.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-warning"></i>
                <i class="fa-solid fa-car-side fa-stack-1x"></i>
                </span>
                <h4 class="my-3">Réparation</h4>
                <p class="text-muted">CarFusion vous offre aussi un espace réparation. Nos professionnels s’engagent à intervenir sur vos véhicules en cas de nécessité.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-warning"></i>
                <i class="fa-solid fa-screwdriver-wrench fa-stack-1x"></i>
                </span>
                <h4 class="my-3">Entretien</h4>
                <p class="text-muted">Mais CarFusion, c’est aussi une promesse d’entretien. Vidange, essuie-glaces ou autres, nos spécialistes s’occupent de tout.</p>
            </div>
            </div>
        </div>
        </section>
        <div class="container">
        <br><br>
        <div class="border-top border-dark border-3 my-1"></div>
        </div>
        <br><br><br>
    EOD;
}

function fondateurs(){
    echo <<<EOD
        <section class="page-section" id="team">
        <div class="container">
            <h2 class="fw-bold text-center text-uppercase">Nos membres fondateurs</h2>
            <br><br><br>
            <div class="row text-center">
            <div class="col-md-3">
                <div class="team-member">
                <img class="mx-auto rounded-circle" src="../images/louis.png" alt="Photo" /><br><br>
                <h4>Louis Courteille</h4>
                <p class="text-muted">Co-fondateur</p>
                <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.linkedin.com/in/louis-courteille-199895251/"><i class="fab fa-linkedin-in"></i></a><br><br>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-member">
                <img class="mx-auto rounded-circle" src="../images/victor.png" alt="Photo" /><br><br>
                <h4>Victor Gillet</h4>
                <p class="text-muted">Co-fondateur</p>
                <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.linkedin.com/in/victor-gillet-40b003245/"><i class="fab fa-linkedin-in"></i></a><br><br>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-member">
                <img class="mx-auto rounded-circle" src="../images/konogan.png" alt="Photo" /><br><br>
                <h4>Konogan Godefroy</h4>
                <p class="text-muted">Co-fondateur</p>
                <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.linkedin.com/in/konogan-godefroy-10b580263/"><i class="fab fa-linkedin-in"></i></a><br><br>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-member">
                <img class="mx-auto rounded-circle" src="../images/nathaniel.png" alt="Photo" /><br><br>
                <h4>Nathaniel Guitton</h4>
                <p class="text-muted">Co-fondateur</p>
                <a class="btn btn-dark btn-social mx-2" target="_blank" href="https://www.linkedin.com/in/nathaniel-guitton-381352241/"><i class="fab fa-linkedin-in"></i></a><br><br>
                </div>
            </div>
            </div>
        </div>
        </section>
        <div class="container">
        <br><br>
        <div class="border-top border-dark border-3 my-1"></div>
        </div>
        <br><br><br>
    EOD;
}

    // Appel Modele
    $partners = getPartenaire();
    function partenaire($partners) {
        $output = '';
    
        // Section "Nos indispensables partenaires"
        if (!empty(getPartenaire())){
            $output .= <<<EOD
            <section>
            <div class="container">
                <h2 class="fw-bold text-center text-uppercase">Nos indispensables partenaires</h2><br><br><br>
            </div>
            <div class="container">
                <div class="row">
            EOD;
        
            foreach ($partners as $partner) {
                $output .= <<<EOD
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="{$partner['photo']}" alt="{$partner['nom']}" class="img-thumbnail" style="width: 200px;">
                        </div>
                        <div class="text-center">
                            <h5>{$partner['nom']}</h5>
                            <p>{$partner['description']}</p>
                        </div>
                    </div>
                EOD;
            }
        
            // Fermeture des balises de la section
            $output .= <<<EOD
                </div>
            </div>
            </section>
            EOD;
        
            echo $output;
        }
    }
    
?>

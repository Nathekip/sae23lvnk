let currentInterval = null;

function movevoiturebleue() {
  if (currentInterval) {
    clearInterval(currentInterval);
  }
  document.getElementById("Voiture Bleue").style.display = "none";
  document.getElementById("Voiture Verte").style.display = "none";
  document.getElementById("Voiture Rouge").style.display = "none";
  document.getElementById("Voiture Logo").style.display = "none";
  let img = document.getElementById("Voiture Bleue");  // Récupère l'élément image par son ID
  img.src = "images/voiture-bleue.png";

  // Affiche l'image
  img.style.display = "block";

  let pos = 2; // Initialise la position de l'image en pourcentage
  let pos_def = 12.7;
  let pageWidth = window.innerWidth; // Récupère la largeur de la fenêtre en pixels
  let imgWidth = img.offsetWidth; // Récupère la largeur de l'image en pixels
  let pixelPerPercent = pageWidth / 100; // Calcule le nombre de pixels par pourcentage

  // Déplace l'image toutes les 10ms
  currentInterval = setInterval(frame, 8);

  function frame() {
    if (pos >= 15.1) { // Arrête l'animation si la position atteint 70% de la largeur de la page
      clearInterval(currentInterval);
      currentInterval = null;
      // Cache l'image de la voiture bleue
      img.style.left = pos_def + '%';
      img.style.display = "none";
      // Replace l'image de la voiture bleue à sa position de départ
      img.style.left = "2%";
      // Affiche l'image de la voiture verte à la position où la voiture bleue s'est arrêtée
      let imgVerte = document.getElementById("Voiture Verte");
      imgVerte.style.left = pos_def + '%';
      imgVerte.style.display = "block";
      movevoitureverte();
    } else {
      // Déplace l'image horizontalement en ajoutant 1 pourcentage à la position de gauche à chaque appel
      pos+=0.08;
      let left = pos * pixelPerPercent - imgWidth / 2; // Calcule la position en pixels
      img.style.left = left + 'px';
    }
  }
}
function movevoitureverte() {
  if (currentInterval) {
    clearInterval(currentInterval);
  }
  document.getElementById("Voiture Bleue").style.display = "none";
  document.getElementById("Voiture Verte").style.display = "none";
  document.getElementById("Voiture Rouge").style.display = "none";
  document.getElementById("Voiture Logo").style.display = "none";
  let img = document.getElementById("Voiture Verte");  // Récupère l'élément image par son ID
  img.src = "images/voiture-verte.png";

  // Affiche l'image
  img.style.display = "block";

  let pos = 15.1; // Initialise la position de l'image en pourcentage
  let pos_def = 36.5;
  let pageWidth = window.innerWidth; // Récupère la largeur de la fenêtre en pixels
  let imgWidth = img.offsetWidth; // Récupère la largeur de l'image en pixels
  let pixelPerPercent = pageWidth / 100; // Calcule le nombre de pixels par pourcentage

  // Déplace l'image toutes les 10ms
  currentInterval = setInterval(frame, 8);

  function frame() {
    if (pos >= 40) { // Arrête l'animation si la position atteint 70% de la largeur de la page
      clearInterval(currentInterval);
      currentInterval = null;
      // Cache l'image de la voiture verte
      img.style.left = pos_def + '%';
      img.style.display = "none";
      // Replace l'image de la voiture bleue à sa position de départ
      img.style.left = "15.1%";
      // Affiche l'image de la voiture rouge à la position où la voiture verte s'est arrêtée
      let imgRouge = document.getElementById("Voiture Rouge");
      imgRouge.style.left = pos_def + '%';
      imgRouge.style.display = "block";
      movevoiturerouge();
    } else {
      // Déplace l'image horizontalement en ajoutant 1 pourcentage à la position de gauche à chaque appel
      pos+=0.08;
      let left = pos * pixelPerPercent - imgWidth / 2; // Calcule la position en pixels
      img.style.left = left + 'px';
    }
  }
}

function movevoiturerouge() {
  if (currentInterval) {
    clearInterval(currentInterval);
  }
  document.getElementById("Voiture Bleue").style.display = "none";
  document.getElementById("Voiture Verte").style.display = "none";
  document.getElementById("Voiture Rouge").style.display = "none";
  document.getElementById("Voiture Logo").style.display = "none";
  let img = document.getElementById("Voiture Rouge");  // Récupère l'élément image par son ID
  img.src = "images/voiture-rouge.png";

  // Cache l'image
  img.style.display = "block";

  let pos = 40; // Initialise la position de l'image en pourcentage
  let pos_def = 60.5;
  let pageWidth = window.innerWidth; // Récupère la largeur de la fenêtre en pixels
  let imgWidth = img.offsetWidth; // Récupère la largeur de l'image en pixels
  let pixelPerPercent = pageWidth / 100; // Calcule le nombre de pixels par pourcentage

  // Déplace l'image toutes les 10ms
  currentInterval = setInterval(frame, 8);

  function frame() {
    if (pos >= 64.5) { // Arrête l'animation si la position atteint 70% de la largeur de la page
      clearInterval(currentInterval);
      currentInterval = null;
      // Cache l'image de la voiture bleue
      img.style.left = pos_def + '%';
      img.style.display = "none";
      // Replace l'image de la voiture bleue à sa position de départ
      img.style.left = "40%";
      // Affiche l'image de la voiture verte à la position où la voiture bleue s'est arrêtée
      let imgLogo = document.getElementById("Voiture Logo");
      imgLogo.style.left = pos_def + '%';
      imgLogo.style.display = "block";
      movevoiturelogo();
    } else {
      // Déplace l'image horizontalement en ajoutant 1 pourcentage à la position de gauche à chaque appel
      pos+=0.08;
      let left = pos * pixelPerPercent - imgWidth / 2; // Calcule la position en pixels
      img.style.left = left + 'px';
    }
  }
}
function movevoiturelogo() {
  if (currentInterval) {
    clearInterval(currentInterval);
  }
  document.getElementById("Voiture Bleue").style.display = "none";
  document.getElementById("Voiture Verte").style.display = "none";
  document.getElementById("Voiture Rouge").style.display = "none";
  document.getElementById("Voiture Logo").style.display = "none";
  let img = document.getElementById("Voiture Logo");  // Récupère l'élément image par son ID
  img.src = "images/voiture-logo.png";

  // Cache l'image
  img.style.display = "block";

  let pos = 64.5; // Initialise la position de l'image en pourcentage
  let pageWidth = window.innerWidth; // Récupère la largeur de la fenêtre en pixels
  let imgWidth = img.offsetWidth; // Récupère la largeur de l'image en pixels
  let pixelPerPercent = pageWidth / 100; // Calcule le nombre de pixels par pourcentage

  // Déplace l'image toutes les 10ms
  currentInterval = setInterval(frame, 8);

  function frame() {
    if (pos >= 88.2) { // Arrête l'animation si la position atteint 70% de la largeur de la page
      clearInterval(currentInterval);
      currentInterval = null;
    } else {
      // Déplace l'image horizontalement en ajoutant 1 pourcentage à la position de gauche à chaque appel
      pos+=0.08;
      let left = pos * pixelPerPercent - imgWidth / 2; // Calcule la position en pixels
      img.style.left = left + 'px';
    }
  }
}

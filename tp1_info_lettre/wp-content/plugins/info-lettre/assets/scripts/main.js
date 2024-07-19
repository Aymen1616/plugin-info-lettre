window.addEventListener('DOMContentLoaded',function(){
    const elPopup = document.querySelector('[data-js-il-pop-up]');
    this.setTimeout(function(){
        elPopup.classList.replace('il-pop-up--ferme','il-pop-up--ouvert')
    },1000)


// Variables
let sectionActuelle = 0;

// Éléments HTML
const formulaire = document.querySelector("form#formulaire-inscription");
const sections = formulaire.querySelectorAll("section");
const boutons = formulaire.querySelectorAll(".bouton[data-direction]");
const champsFormulaire = formulaire.querySelectorAll("[name]");


//Fonctions
function init() {
    formulaire.addEventListener("submit", onSubmit);
    champsFormulaire.forEach(function (champ) {
        cacherErreur(champ);
    });

    boutons.forEach(function (bouton) {
        bouton.addEventListener("click", onBoutonClic);
        
    });

    validerSection(sectionActuelle);
    afficherSection(sectionActuelle);
}

//=========================================================
// Soumission du formulaire et validation
function onSubmit(evenement) {
    evenement.preventDefault();

    if (formulaire.checkValidity() && sectionActuelle == sections.length - 1) {
         formulaire.submit();
    }
}


function validerSection(index) {
    const section = sections[index];
    const inputs = section.querySelectorAll("[name]");
    let validityTableau = [];

    inputs.forEach(function (input) {
        const estValide = input.checkValidity();
        console.log(estValide, input);
        validityTableau.push(estValide);
    });

    const sectionValide = validityTableau.includes(false) == false;
    const boutonSuivant = section.querySelector(".bouton[data-direction='1'");

    if (boutonSuivant !== null) {
        boutonSuivant.classList.toggle("inactif", sectionValide == false);
    }

    return sectionValide;
}

function afficherErreur(champ) {
    const erreur = champ.parentElement.querySelector(".erreur");

    if (erreur !== null) {
        erreur.classList.remove("invisible");
    }
}

function cacherErreur(champ) {
    const erreur = champ.parentElement.querySelector(".erreur");

    if (erreur !== null) {
        erreur.classList.add("invisible");
    }
}

//=========================================================
// Affichage des sections
function afficherSection(index) {
    toutCacher();
    sections.forEach(function (section) {
        const page = parseInt(section.dataset.page);

        if (page == index) {
            section.classList.remove("invisible");
        } else {
            section.classList.add("invisible");
        }
    });
    console.log(sectionActuelle);
}

function toutCacher() {
    sections.forEach(function (section) {
        section.classList.add("invisible");
    });
}


//=========================================================
// Navigation
function onBoutonClic(evenement) {
    const direction = parseInt(evenement.target.dataset.direction);

    if (direction === -1) {
        reculerSection();
    } else {
        // Avant d'avancer à la section suivante, vérifiez si la section actuelle est valide
        if (validerSection(sectionActuelle)) {
            avancerSection();
        } else {
            // Affichez l'erreur si le champ est vide
            const section = sections[sectionActuelle];
            const inputs = section.querySelectorAll("[name]");
            inputs.forEach(function (input) {
                if (!input.checkValidity()) {
                    afficherErreur(input);
                }
            });
        }
    }
}


function avancerSection() {
    if (sectionActuelle < sections.length - 1) {
        sectionActuelle++;
        afficherSection(sectionActuelle);
        validerSection(sectionActuelle);
    }
}

function reculerSection() {
    if (sectionActuelle > 0) {
        sectionActuelle--;
        afficherSection(sectionActuelle);
    }
}

// Exécution
init();
});
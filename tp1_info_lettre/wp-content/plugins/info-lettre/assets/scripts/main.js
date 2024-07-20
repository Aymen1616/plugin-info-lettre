window.addEventListener('DOMContentLoaded', function () {
    const elPopup = document.querySelector('[data-js-il-pop-up]');
    elPopup.classList.add('il-pop-up--ferme');
    // Vérifier l'état de la popup dans localStorage avant de l'ouvrir
    if (localStorage.getItem('popupFerme') === 'true') {
        setTimeout(function () {
            elPopup.classList.replace('il-pop-up--ferme', 'il-pop-up--ouvert')
        }, 1000)
    }

    // Variables
    let sectionActuelle = 0;

    // Éléments HTML
    const formulaire = document.querySelector("form#formulaire-inscription");
    const sections = formulaire.querySelectorAll("section");
    const boutons = formulaire.querySelectorAll(".bouton[data-direction]");
    const champsFormulaire = formulaire.querySelectorAll("[name]");
    const fermerPop = document.querySelector('.fermer-popup');
    fermerPop.addEventListener('click', fermerPopup);

    //Fonctions
    /** Cette fonction initialise le formulaire. Elle ajoute des écouteurs d’événements pour la soumission du formulaire et le clic sur les boutons. Elle cache également les erreurs de validation initiales et affiche la première section du formulaire. */
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

    /**Cette fonction est appelée lorsque le formulaire est soumis. Elle empêche l’action par défaut du formulaire (qui est de recharger la page), crée un nouvel objet FormData à partir du formulaire, et envoie ces données au serveur avec fetch */
    function onSubmit(evenement) {
        evenement.preventDefault();
        if (formulaire.checkValidity() && sectionActuelle == sections.length - 1) {
            // Créer un nouvel objet FormData à partir du formulaire
            let data = new FormData(formulaire);
            // Envoyer les données du formulaire au serveur avec fetch
            fetch(formulaire.action, {
                method: formulaire.method,
                body: data
            }).then(response => {
                console.log('Success:', response);
                // Déplacer ces lignes de code à l'intérieur de .then()
                fermerPopup(); // Fermer la popup après la soumission du formulaire
                localStorage.setItem('popupFerme', 'true'); // Enregistrer l'état de la popup dans localStorage
            }).catch((error) => {
                console.error('Error:', error);
            });
        }
    }

    /** Cette fonction valide une section spécifique du formulaire. Elle vérifie la validité de chaque champ d’entrée dans la section et désactive le bouton “Suivant” si la section n’est pas valide. */
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

    /** affiche l’erreur de validation pour un champ spécifique. */
    function afficherErreur(champ) {
        const erreur = champ.parentElement.querySelector(".erreur");

        if (erreur !== null) {
            erreur.classList.remove("invisible");
        }
    }

    /** cache l’erreur de validation pour un champ spécifique. */
    function cacherErreur(champ) {
        const erreur = champ.parentElement.querySelector(".erreur");

        if (erreur !== null) {
            erreur.classList.add("invisible");
        }
    }

    //=========================================================
    // rend une section spécifique visible.
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
    }

    //rend toutes les sections invisibles
    function toutCacher() {
        sections.forEach(function (section) {
            section.classList.add("invisible");
        });
    }

    //=========================================================
    // Navigation
    /**Cette fonction est appelée lorsque l’utilisateur clique sur un bouton. Elle détermine si l’utilisateur peut avancer. */
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

    /**
     * avance dans le formulaire en augmentant la variable sectionActuelle, et en affichant la section correspondante.
     */
    function avancerSection() {
        if (sectionActuelle < sections.length - 1) {
            sectionActuelle++;
            afficherSection(sectionActuelle);
            validerSection(sectionActuelle);
        }
    }

    /** recule dans le formulaire en diminuant la variable sectionActuelle, et en affichant la section correspondante. */
    function reculerSection() {
        if (sectionActuelle > 0) {
            sectionActuelle--;
            afficherSection(sectionActuelle);
        }
    }

    /**Cette fonction ferme la popup en changeant sa classe CSS, et enregistre l’état de la popup dans localStorage. */
    function fermerPopup() {
        elPopup.classList.replace('il-pop-up--ouvert', 'il-pop-up--ferme');
        localStorage.setItem('formClosed', 'true');
    }
    // Exécution
    init();
});
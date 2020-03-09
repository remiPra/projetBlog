class ValidationFormulaire {
    constructor() {
        //DOM du chapitre
        this.numberPossible = document.getElementById("numberPossible");

        // bouton de valider chapitreValidation
        this.numberPossible.onkeyup = this.validationChapitre.bind(this);
        // evenement lors du chargement de la page

    }

    validationChapitre() {


        let str = document.getElementById("chapitreNumberUse").innerHTML;
        let textid = this.numberPossible.value;
        let pos = str.indexOf(textid);
        let erreur = "ce numero de chapitre est deja choisi";
        let valider = "vous pouvez choisir ce chapitre";
        if (pos >= 0) {
            document.getElementById("demo").innerHTML = erreur;
            document.getElementById("validationPhrase").style.display = "block";
            document.getElementById("chapitreValidationBtn").style.display = "none";

        } else {
            document.getElementById("demo").innerHTML = valider;
            document.getElementById("validationPhrase").style.display = "none";
            document.getElementById("chapitreValidationBtn").style.display = "block";
            document.getElementById("chapitreValidationBtn").type = "submit";
        }
    }
}

new ValidationFormulaire();
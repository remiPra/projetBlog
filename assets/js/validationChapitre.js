class ValidationFormulaire {
    constructor() {
        //DOM du chapitre
        this.numberPossible = document.getElementById("numberPossible");
        this.listImages  = document.getElementById("listImages");
        this.imageCurrent = document.querySelector('input[type="file"]')
        // bouton de valider chapitreValidation
        this.numberPossible.onkeyup = this.validationChapitre.bind(this);
        window.onload = this.validationChapitre.bind(this);
        this.imageCurrent.onchange = this.validationImage.bind(this);
        // evenement lors du chargement de la page

    }
    validationImage(){
        let imagesValue =  this.listImages.innerHTML;
        console.log(imagesValue);
        let text = document.querySelector('input[type="file"]').value;
        let res = text.slice(12,1000);
        let pos = imagesValue.indexOf(res);
        console.log(res);
        console.log(pos);
        let erreur = "vous ne pouvez pas choisir ce chapitre";
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
    validationChapitre() {




        let str = document.getElementById("chapitreNumberUse").innerHTML;
        let textid = this.numberPossible.value;
        let pos = str.indexOf(textid);
        let erreur = "vous ne pouvez pas choisir ce chapitre";
        let valider = "vous pouvez choisir ce chapitre";
        if (pos >= 0 || (isNaN(textid) == true)) {
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
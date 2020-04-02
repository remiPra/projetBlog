class ValidationFormulaire {
    constructor() {
        //DOM du Chapter
        this.numberPossible = document.getElementById("numberPossible");
        this.listImages  = document.getElementById("listImages");
        this.imageCurrent = document.querySelector('input[type="file"]');
        
        
        //DOM du dom des notifications image
        this.imagePossibleValidate = document.getElementById('imagePossibleValidate');
        this.imagePossibleValidateP = document.querySelector('#imagePossibleValidate p');
        this.imagePossibleValidateButton = document.querySelector('#imagePossibleValidate button');

        // booleen pour l'activation du Button envoie
        this.imageValidate = false;
        this.ChapterValidate = false;
        // Button de valider ChapterValidation
        this.confirmValidate = document.getElementById("confirmValidate");
        this.prepareSend = document.getElementById("prepareSend");
        // Button des retours
        this.returnChapter = document.getElementById("returnChapter");
        this.closeConfirmValidate = document.getElementById("closeConfirmValidate");
        this.ChapterValidationBtn = document.getElementById("ChapterValidationBtn");
        
        // evenement lors du chargement de la page
        
        this.init()
        // Evenement
        this.imageCurrent.onchange = this.validationImage.bind(this);
        this.numberPossible.onkeyup = this.validationChapter.bind(this);
        this.prepareSend.addEventListener("click",this.submitDone.bind(this));
        this.returnChapter.addEventListener("click",this.return.bind(this));
        this.closeConfirmValidate.addEventListener("click",this.return.bind(this));
        
        this.imagePossibleValidateButton.addEventListener("click",this.imageNotification.bind(this));
        
    }
    // initation des verification
    init() {
        this.imagePossibleValidate.style.display= "none"
        this.ChapterValidationBtn.style.display = "none";
        this.returnChapter.style.display = "none";
        this.confirmValidate.style.display = "none";
        this.prepareSend.style.display="none";
    }
    // om met en cache la liste des images
    imageNotification() {
        this.imagePossibleValidate.style.display = "none";
    }
    // si on ne veut pas valider
    return() {
        this.returnChapter.style.display = "none";
        this.confirmValidate.style.display = "none";
    }

    // methode de la validation de l'image
    validationImage(){
        let imagesValue =  this.listImages.innerHTML;
        console.log(imagesValue);
        let text = document.querySelector('input[type="file"]').value;
        let res = text.slice(12,300);
        let pos = imagesValue.indexOf(res);
        console.log(res);
        console.log(pos);
      //!!! v'est juste une recommandation pas une obligation d'avoir la meme image
        if (pos < 0) {
            this.imagePossibleValidate.style.display = "block";
            alert("oui");
            this.imagePossibleValidateP.innerHTML = "Cette image n'a jamais été utilisé, c'est parfait"
            this.imagePossibleValidateButton.style.display = "block";
            this.imageValidate = true;
        } else {
            this.imagePossibleValidate.style.display = "block";
            alert("non");
            this.imagePossibleValidateP.innerHTML = " cette image a deja été utilsé , faites attention"
            this.imagePossibleValidateButton.style.display = "block";
            this.imageValidate = true;
        }
    }
    // méthodes de validationd des différents chapitres
    validationChapter() {
        //recuperation des différents listes de chapitres utlisés
        let str = document.querySelectorAll("#ChapterNumberUseList span");
        let str1 = [];
        for(let i=0;i<str.length;i++) {
            str1.push(str[i].innerHTML); 
            };
        console.log(str1);
        // recuperation de la valeur dans l'input
        let textid = this.numberPossible.value;
        console.log(textid);
        console.log(Number.isInteger(textid));
        // verification si le numero n'est pas deja utilisé
        let v = str1.includes(textid);
        console.log(v);



        let Error = "<p id='Error'>vous ne pouvez pas choisir ce Chapter</p>";
        let valider = "<p class='success'>vous pouvez choisir ce Chapter</p>";
        if (v) {
            document.getElementById("numberPossibleValidate").innerHTML = Error;
           console.log("dejaPris");
            document.getElementById("validationPhrase").style.display = "block";
            document.getElementById("ChapterValidationBtn").style.display = "none";
            this.prepareSend.style.display="none";
            this.ChapterValidate = false;

        } else {
            console.log("succes");
            document.getElementById("numberPossibleValidate").innerHTML = valider;
            this.prepareSend.style.display="block";
            this.ChapterValidate = true;
            this.imageValidate = true;

        }
    }
    // affichage des boutons de validations
    submitDone() {
        if( this.imageValidate == true && this.ChapterValidate == true) {
            console.log("success");
            document.getElementById("confirmValidate").style.display = "block";
            this.ChapterValidationBtn.style.display = "block";
            // changement du type de bouton a submit
            this.ChapterValidationBtn.type = "submit";
            
            document.querySelector("#confirmValidate p").innerHTML = "Etes vous sur de vos saisies?";
            this.closeConfirmValidate.style.display = "none";
            this.returnChapter.style.display = "block";
        }
        else {   
            //Error
            this.ChapterValidationBtn.style.display = "none"; 
            document.getElementById("confirmValidate").style.display = "block";
            document.querySelector("#confirmValidate p").innerHTML = "il y a des Errors dans votre saisie";
            document.getElementById("closeConfirmValidate").style.display = "block";
        }



    }
}

new ValidationFormulaire();
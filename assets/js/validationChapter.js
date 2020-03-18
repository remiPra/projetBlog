class ValidationFormulaire {
    constructor() {
        //DOM du Chapter
        this.numberPossible = document.getElementById("numberPossible");
        this.listImages  = document.getElementById("listImages");
        this.imageCurrent = document.querySelector('input[type="file"]')
        // booleen pour l'activation du bouton envoie
        this.imageValidate = false;
        this.ChapterValidate = false;
        // bouton de valider ChapterValidation
        this.confirmValidate = document.getElementById("confirmValidate");
        this.prepareSend = document.getElementById("prepareSend");
        // bouton des retours
        this.returnChapter = document.getElementById("returnChapter");
        this.closeConfirmValidate = document.getElementById("closeConfirmValidate");

        this.ChapterValidationBtn = document.getElementById("ChapterValidationBtn");

        // evenement lors du chargement de la page
        
        this.init()
        
        document.onload = this.validationChapter.bind(this);
        this.imageCurrent.onchange = this.validationImage.bind(this);
        this.numberPossible.onkeyup = this.validationChapter.bind(this);
        this.prepareSend.addEventListener("click",this.submitDone.bind(this));
        
        this.returnChapter.addEventListener("click",this.return.bind(this));
        this.closeConfirmValidate.addEventListener("click",this.return.bind(this));


    }
    init() {
        this.ChapterValidationBtn.style.display = "none";
        this.returnChapter.style.display = "none";
        this.confirmValidate.style.display = "none";
    }

    return() {
        this.returnChapter.style.display = "none";
        this.confirmValidate.style.display = "none";
    }
    validationImage(){
        let imagesValue =  this.listImages.innerHTML;
        console.log(imagesValue);
        let text = document.querySelector('input[type="file"]').value;
        let res = text.slice(12,1000);
        let pos = imagesValue.indexOf(res);
        console.log(res);
        console.log(pos);
        let Error = "vous ne pouvez pas choisir cette image ";
        let valider = "vous pouvez choisir cette image";
        if (pos >= 0) {
            document.getElementById("imagePossibleValidate").innerHTML = Error;
            document.getElementById("validationPhrase").style.display = "block";
            document.getElementById("ChapterValidationBtn").style.display = "none";
            this.imageValidate = false;
            
        } else {
            document.getElementById("imagePossibleValidate").innerHTML = valider;
            document.getElementById("validationPhrase").style.display = "none";
            this.imageValidate = true;
        }
    }
    validationChapter() {

        let str = document.getElementById("ChapterNumberUse").innerHTML;
        let textid = this.numberPossible.value;
        let pos = str.indexOf(textid);
        let Error = "vous ne pouvez pas choisir ce Chapter";
        let valider = "vous pouvez choisir ce Chapter";
        if (pos >= 0 || (isNaN(textid) == true)) {
            document.getElementById("numberPossibleValidate").innerHTML = Error;
            document.getElementById("validationPhrase").style.display = "block";
            document.getElementById("ChapterValidationBtn").style.display = "none";
            this.ChapterValidate = false;

        } else {
            document.getElementById("numberPossibleValidate").innerHTML = valider;
            document.getElementById("validationPhrase").style.display = "none";
            this.ChapterValidate = true;
            this.imageValidate = true;
        }
    }

    submitDone() {
        if( this.imageValidate == true && this.ChapterValidate == true) {
            console.log("success");
            document.getElementById("confirmValidate").style.display = "block";
            this.ChapterValidationBtn.style.display = "block";
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
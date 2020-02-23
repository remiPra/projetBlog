class Toggle {
    constructor() {
        //initiaisation des propriétés de classe
        this.toggle = document.getElementById('toggle');
        this.ul = document.getElementById('ulMenu');
        window.onresize= this.responsive.bind(this);
        window.onload = this.responsive.bind(this);
        this.toggle.addEventListener("click", this.menuDeroulant.bind(this));
        this.click = null;
        
        this.header = document.getElementById("mainHeader");
        this.menu = document.querySelectorAll("#menu a");
        window.onscroll = this.scroll.bind(this);
    }
//transformation du menu suivant la largeur de la fenetre
responsive() {
    //si la fenetre reduit sa largeur
    if (window.innerWidth < 900) {
        console.log(this.toggle)
        this.toggle.style.display = "block";
        this.ul.style.display ="none";
    

    }
    else {
        this.toggle.style.display = "none";
        this.ul.style.display = "flex";}
}

//methode pour afficher le menu deroulant du menu
menuDeroulant() {
    if (window.innerWidth < 900) {
        this.header.style.color = "white";
        this.toggle.style.color = "#061319";
        this.toggle.style.backgroundColor = "#061319";
        this.toggle.style.border = "2px solid #061319 ";
        this.header.style.backgroundColor = "#061319"
        for(var i=0;i<this.menu.length;i++) {

            this.menu[i].style.color = "white";
        }
    }
    
    //on incremente le click
    this.click++

    if (this.click == 1 ) {
        this.ul.style.display = "block";
        console.log(this.click);
   
    }
    else if (this.click == 2){
        this.ul.style.display = "none";
        this.click = 0;}
    }

    //methode qui va changer la couleur du menu lors du scroll
    scroll(){
        if (document.documentElement.scrollTop > 1  && window.innerWidth < 5000) {
        this.header.style.color = "white";
        this.toggle.style.color = "white";
        this.toggle.style.backgroundColor = "#061319";
        this.toggle.style.border = "2px solid #061319";
        this.header.style.backgroundColor = "#061319"
        for(var i=0;i<this.menu.length;i++) {

            this.menu[i].style.color = "white";
        }
      
   
        console.log("en-dessous");
    }
    else {
        this.header.style.color = "#061319" ;
        this.toggle.style.color = "#061319";
        this.toggle.style.backgroundColor = "transparent";
        this.toggle.style.border = "2px solid transparent";
        this.header.style.backgroundColor =  "transparent";
        for(var i=0;i<this.menu.length;i++) {

            this.menu[i].style.color = "#061319";
        }
    }
}
}
new Toggle();

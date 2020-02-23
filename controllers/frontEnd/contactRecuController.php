<?php
//appel de la méthode contact pur recuperer le message
require 'models/frontEnd/contactManager.php';
contactForm();

//affichag de la page qui montre que le contact est recu
require 'views/frontEnd/contactRecuView.php';
?>
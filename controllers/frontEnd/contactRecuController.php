<?php
//appel de la méthode contact pur recuperer le message
require 'models/frontEnd/contactManager.php';
$ContactManager = new ContactManager();
$contactForm = $ContactManager->contactForm();

//affichag de la page qui montre que le contact est recu
require 'views/frontEnd/contactRecuView.php';
?>
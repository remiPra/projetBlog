<?php
if (($_POST['pseudo'] != null) AND ($_POST['email'] != null) 
    AND ($_POST['message'] != null) AND ($_POST['subject'] != null)  ) {

    //appel de la méthode contact pur recuperer le message
    require 'models/frontEnd/contactManager.php';
    $ContactManager = new ContactManager();
    $contactForm = $ContactManager->contactForm();
    
    //affichag de la page qui montre que le contact est recu
    require 'views/frontEnd/contactRecuView.php';
}
else {
   
    $notificationError = "vous n'avez pas remplis tous les champs";
    require 'views/frontEnd/contactView.php';
}
?>
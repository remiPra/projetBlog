<?php

if(isset($_GET['action'])) {
    ////////////////////////////////////////////////////
    ///////////Partie Frond-end///////////////////////
    //////////////////////////////////////////////////
    // redirection page d'accueil
    if ($_GET['action'] == 'index') {
        require 'controllers/frontEnd/indexController.php';
    }
    // redirection vers la liste des chapitres 
    else if($_GET['action'] == 'livre') {
        require 'controllers/frontEnd/livreController.php';
    }
    // redirection vers la page d'administration
    else if($_GET['action'] == 'administration') {
        require 'controllers/frontEnd/administrationController.php';
    }
    // redirection vers la page bibliographie
    else if($_GET['action'] == 'bibliographie') {
        require 'controllers/frontEnd/bibliographieController.php';
    }
    // redirection vers la page contact
    else if($_GET['action'] == 'contact') {
        require 'controllers/frontEnd/contactController.php';
    }
    // redirection vers la page confirmant la reception du message
    else if($_GET['action'] == 'contactRecu') {
        require 'controllers/frontEnd/contactRecuController.php';
    }
    // redirection vers la page confirmant le signalement 
    else if($_GET['action'] == 'signalementRecu') {
        require 'controllers/frontEnd/signalementController.php';
    }
    // redirection vers la page des articles suivant l'id selectionné
    else if(($_GET['action'] == 'article') AND (isset($_GET['id']))) {
        require 'controllers/frontEnd/articleController.php';     
    }
    
    //////////////////////////////////////
    ////////// Partie Administration//////
    //////////////////////////////////////
    // redirection vers la page d'accueil d'administration
    else if($_GET['action'] == 'administrationHome') {
        require 'controllers/backEnd/administrationHomeController.php';
    }
    // redirection vers la page d'Administration Chapitres 
    else if($_GET['action'] == 'administrationChapitres') {
        require 'controllers/backEnd/administrationChapitresController.php';
    }
    // redirection vers la page d'ecriture d'un nouveau chapitre 
    else if($_GET['action'] == 'administrationChapitresEcrire') {
        require 'controllers/backEnd/administrationChapitresEcrireController.php';
    }
    else if($_GET['action'] == 'administrationChapitresModifier') {
        require 'controllers/backEnd/administrationChapitresModifierController.php';
    }
    //redirection vers la page des chapitres après modification d'un chapitre
    else if($_GET['action'] == 'administrationChapitreModifierEnvoi') {
        require 'controllers/backEnd/administrationChapitreModifierEnvoiController.php';
    }
   
    
    
    
    else if($_GET['action'] == 'administrationChapitreNouveau') {
        require 'controllers/backEnd/administrationChapitreNouveauController.php';
    }
    //redirection vers le chapitre a mettre dans la liste des chapitres supprimer
    else if($_GET['action'] == 'administrationChapitresSupprimer' AND (isset($_GET['id']))) {
        require 'controllers/backEnd/administrationChapitresSupprimerController.php';
    }
    //redirection vers la page des chapitres après modification d'un chapitre de supprimer a brouillon
     else if($_GET['action'] == 'administrationChapitreTransformerBrouillon' AND (isset($_GET['id']))) {
        require 'controllers/backEnd/administrationChapitreTransformerBrouillonController.php';
    }
    //redirection vers la page des chapitres après suppression definitive 
     else if($_GET['action'] == 'administrationChapitreTransformerSupprimer' AND (isset($_GET['id']))) {
        require 'controllers/backEnd/administrationChapitreTransformerSupprimerController.php';
    }

    // redirection vers la page d'accueil des commentaires
    else if($_GET['action'] == 'administrationCommentaires') {
        require 'controllers/backEnd/administrationCommentairesController.php';
    }




   
}

else {
    require 'controllers/frontEnd/indexController.php';
}



?>


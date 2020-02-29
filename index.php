<?php
session_start();
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
    // redirection vers la page d'administration ssi session n'existe pas
    else if($_GET['action'] == 'administration' & ($_SESSION['connect']== null)) {
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
     // redirection vers la page de verification de pseudo et password
    else if($_GET['action'] == 'administrationConnexion') {
        require 'controllers/backEnd/administrationConnexionController.php';
    }
    else if($_GET['action'] == 'administrationConnexionErreur') {
        require 'controllers/backEnd/administrationConnexionErreurController.php';
    }


    //////////////////////////////////////
    ////////// Partie Administration//////
    //////////////////////////////////////

    else if(($_SESSION['connect']!= null)) {
         // redirection vers la page d'accueil d'administration Accueil
        if($_GET['action'] == 'administrationHome' & ($_SESSION['connect']!= null) ) {
            require 'controllers/backEnd/administrationHomeController.php';
        }
        else if($_GET['action'] == 'administration') {
            require 'controllers/backEnd/administrationHomeController.php';
        }
        // redirection vers la page d'Administration Chapitres 
        else if($_GET['action'] == 'administrationChapitres' & ($_SESSION['connect']!= null)) {
            require 'controllers/backEnd/administrationChapitresController.php';
        }
        // redirection vers la page d'ecriture d'un nouveau chapitre 
        else if($_GET['action'] == 'administrationChapitresEcrire') {
            require 'controllers/backEnd/administrationChapitresEcrireController.php';
        }
        // redirection sur la page du chapitre a modifier 
        else if($_GET['action'] == 'administrationChapitresModifier' AND (isset($_GET['id']))) {
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
        //redirection vers la page des commentaires  après transformer "en cours"  
        else if($_GET['action'] == 'AdministrationCommentairesTransformerEnCours' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/AdministrationCommentairesTransformerEnCoursController.php';
        }
        //redirection vers la page des commentaires  après suppression definitive 
        else if($_GET['action'] == 'AdministrationCommentairesTransformerSuppression' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/AdministrationCommentairesTransformerSuppressionController.php';
        }
        //redirection vers la page des commentaires  après supprimer 
        else if($_GET['action'] == 'AdministrationCommentairesTransformerSupprimer' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/AdministrationCommentairesTransformerSupprimerController.php';
        }
        //redirection vers la page des commentaires  après valider 
        else if($_GET['action'] == 'AdministrationCommentairesTransformerValider' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/AdministrationCommentairesTransformerValiderController.php';
        }



        
        // redirection vers la page d'accueil des messages de contact
        else if($_GET['action'] == 'administrationContactHome') {
            require 'controllers/backEnd/administrationContactHomeController.php';
        }
        // redirection vers la page d'accueil des messages non lu
        else if($_GET['action'] == 'administrationContactMessageNonLu' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/administrationContactMessageNonLuController.php';
        }
        // redirection vers la page de suppression de messsages de contact
        else if($_GET['action'] == 'administrationContactTransformerSuppression' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/administrationContactTransformerSuppressionController.php';
        }
        // redirection vers la transformation messsages lu
        else if($_GET['action'] == 'administrationContactTransformerLu' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/administrationContactTransformerLuController.php';
        }
        // redirection vers la transformation messsages lu
        else if($_GET['action'] == 'administrationContactTransformerNonLu' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/administrationContactTransformerNonLuController.php';
        }
        // redirection vers la transformation messages liste supprimer
        else if($_GET['action'] == 'administrationContactTransformerSupprimer' AND (isset($_GET['id']))) {
            require 'controllers/backEnd/administrationContactTransformerSupprimerController.php';
        }


    }
    else  {
            $notification =  "vous n'etes pas connectés";
            require 'controllers/frontEnd/indexController.php';
        }   
}

else {
    require 'controllers/frontEnd/indexController.php';
}



?>


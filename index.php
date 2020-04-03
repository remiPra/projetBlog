<?php
session_start();
require 'controllers/controller.php';


if ($_SESSION == false AND isset($_GET['action'])) {
    ////////////////////////////////////////////////////
    ///////////Partie Frond-end///////////////////////
    //////////////////////////////////////////////////
    // redirection page d'accueil

    switch (($_GET['action'])) {
        case 'index':
            index();
            break;
        case 'Book':
            Book();
            break;
        case 'bibliographie':
            bibliographie();
            break;
        case 'contact':
            contact();
            break;
        case 'contactRecu':
            contactRecu();
            break;
        case 'signalementRecu':
            signalementRecu();
            break;
        case 'article':
            if (($_GET['id']) > 0) {
                post();
           
            } else {
                index();
          
            };
        break;
        case 'initializeNewPassword':
                initializePassword();
                break;


        case 'administration':
            administration();
            break;
        case 'administrationConnexion':
            administrationConnexion();
            break;
            // gestion des Errors
        case 'administrationConnexionError':
            administrationConnexionError();
            break;
        case 'administrationConnexionErrorVide':
            administrationConnexionErrorVide();
            break;
        // gestion des mots de passse oubliées 
        case 'administrationPasswordForgot' :
            administrationPasswordForgot();
            break;
        case 'administrationPasswordForgotCheck' :
            administrationPasswordForgotCheck();
            break;

        case 'administrationHome':
        case 'administrationChapters':
        case 'administrationChaptersEcrire':
        case 'administrationChaptersModify':
        
        case 'administrationChapterNouveau':
        case 'administrationChaptersSupprimer':
        case 'administrationChapterTransformBrouillon':
        case 'administrationChapterTransformSupprimer':
        case 'administrationComments':
        case 'AdministrationCommentsTransformEnCours':
        case 'AdministrationCommentsTransformSuppression':
        case 'AdministrationCommentsTransformSupprimer':
        case 'AdministrationCommentsTransformValider':
        case 'administrationContactHome':
        case 'administrationContactHome':
        case 'administrationContactMessageNonLu':
        case 'administrationContactTransformLu':
        case 'administrationContactTransformNonLu':
        case 'administrationContactTransformSuppression':
        case 'administrationContactTransformSupprimer':
            index();
            break;
        default:
            index();
            break;
    }
} else if (($_SESSION == true AND isset($_GET['action']))) {
    switch ($_GET['action']) {
        case 'index':
            index();
            break;
        case 'Book':
            Book();
            break;
        case 'bibliographie':
            bibliographie();
            break;
        case 'contact':
            contact();
            break;
        case 'contactRecu':
            contactRecu();
            break;
        case 'signalementRecu':
            signalementRecu();
            break;
        case 'article':
            if (($_GET['id']) > 0) {
                post();
                break;
            } else {
                index();
                break;
            }


        case 'administration':
        case 'administrationConnexionError':
        case 'administrationConnexionErrorVide':
            administrationHome();
            break;


        case 'administrationHome':

            administrationHome();
            break;
        case 'administrationHomeNewPassword':
            administrationHomeNewPassword();
            break;

        case 'administrationConnexionNewPasswordCheck':
            administrationConnexionNewPasswordCheck();
            break;

        case 'administrationHomeNewPasswordError':
            administrationHomeNewPasswordError();
            break;

        case 'administrationChapters':

            administrationChapters();
            break;
            // nouveau Chapter
        case 'administrationChaptersEcrire':

            administrationChaptersEcrire();
            break;
            // Modify Chapter
        case 'administrationChaptersModify':

            administrationChaptersModify();
            break;
            // envoie du Chapter Modify 
        case 'administrationChapterModifyEnvoi':

            administrationChaptersEnvoiModify();
            break;
        case 'administrationChapterNouveau':

            administrationChapterNouveau();
            break;
            // Transform le Chapter en liste supprimer 
        case 'administrationChaptersSupprimer':

            administrationChaptersSupprimer();
            break;
        case 'administrationChapterTransformBrouillon':

            administrationChapterTransformBrouillon();
            break;
        case 'administrationChapterTransformSupprimer':

            administrationChapterTransformSupprimer();
            break;
            // CommentS
        case 'administrationComments':

            administrationComments();
            break;

        case 'AdministrationCommentsTransformEnCours':

            AdministrationCommentsTransformEnCours();
            break;

        case 'AdministrationCommentsTransformSuppression':

            AdministrationCommentsTransformSuppression();
            break;
        case 'AdministrationCommentsTransformSupprimer':

            AdministrationCommentsTransformSupprimer();
            break;
        case 'AdministrationCommentsTransformValider':

            AdministrationCommentsTransformValider();
            break;
        case 'administrationContactHome':

            administrationContactHome();
            break;
        case 'administrationContactHome':

            administrationContactHome();
            break;
        case 'administrationContactMessageNonLu':

            administrationContactMessageNonLu();
            break;
        case 'administrationContactTransformLu':

            administrationContactTransformLu();
            break;
        case 'administrationContactTransformNonLu':

            administrationContactTransformNonLu();
            break;
        case 'administrationContactTransformSuppression':

            administrationContactTransformSuppression();
            break;
        case 'administrationContactTransformSupprimer':
            administrationContactTransformSupprimer();
            break;
        case 'deconnexion':
            deconnexion();
            break;
        default:
            index();
            break;
    }
} else {
    index();
}

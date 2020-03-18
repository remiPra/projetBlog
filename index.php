<?php
session_start();
require 'controllers/controller.php';

if ($_SESSION['connect'] == null) {
    ////////////////////////////////////////////////////
    ///////////Partie Frond-end///////////////////////
    //////////////////////////////////////////////////
    // redirection page d'accueil

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
            } else {
                index();
            }
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

        case 'administrationHome':
        case 'administrationChapters':
        case 'administrationChaptersEcrire':
        case 'administrationChaptersModifier':
        case 'administrationChapterModifierEnvoi':
        case 'administrationChapterNouveau':
        case 'administrationChaptersSupprimer':
        case 'administrationChapterTransformerBrouillon':
        case 'administrationChapterTransformerSupprimer':
        case 'administrationCommentaires':
        case 'AdministrationCommentairesTransformerEnCours':
        case 'AdministrationCommentairesTransformerSuppression':
        case 'AdministrationCommentairesTransformerSupprimer':
        case 'AdministrationCommentairesTransformerValider':
        case 'administrationContactHome':
        case 'administrationContactHome':
        case 'administrationContactMessageNonLu':
        case 'administrationContactTransformerLu':
        case 'administrationContactTransformerNonLu':
        case 'administrationContactTransformerSuppression':
        case 'administrationContactTransformerSupprimer':
            index(); 
            break;
        default:
            index();
    }
} else if (($_SESSION['connect'] == 1)) {
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

        case 'administrationChapters':

            administrationChapters();
            break;
            // nouveau Chapter
        case 'administrationChaptersEcrire':

            administrationChaptersEcrire();
            break;
            // modifier Chapter
        case 'administrationChaptersModifier':

            administrationChaptersModifier();
            break;
            // envoie du Chapter modifier 
        case 'administrationChapterModifierEnvoi':

            administrationChaptersEnvoiModifier();
            break;
        case 'administrationChapterNouveau':

            administrationChapterNouveau();
            break;
            // transformer le Chapter en liste supprimer 
        case 'administrationChaptersSupprimer':

            administrationChaptersSupprimer();
            break;
        case 'administrationChapterTransformerBrouillon':

            administrationChapterTransformerBrouillon();
            break;
        case 'administrationChapterTransformerSupprimer':

            administrationChapterTransformerSupprimer();
            break;
            // COMMENTAIRES
        case 'administrationCommentaires':

            administrationCommentaires();
            break;

        case 'AdministrationCommentairesTransformerEnCours':

            AdministrationCommentairesTransformerEnCours();
            break;

        case 'AdministrationCommentairesTransformerSuppression':

            AdministrationCommentairesTransformerSuppression();
            break;
        case 'AdministrationCommentairesTransformerSupprimer':

            AdministrationCommentairesTransformerSupprimer();
            break;
        case 'AdministrationCommentairesTransformerValider':

            AdministrationCommentairesTransformerValider();
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
        case 'administrationContactTransformerLu':

            administrationContactTransformerLu();
            break;
        case 'administrationContactTransformerNonLu':

            administrationContactTransformerNonLu();
            break;
        case 'administrationContactTransformerSuppression':

            administrationContactTransformerSuppression();
            break;
        case 'administrationContactTransformerSupprimer':
            administrationContactTransformerSupprimer();
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

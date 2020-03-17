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
        case 'livre':
            livre();
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
            // gestion des erreurs
        case 'administrationConnexionErreur':
            administrationConnexionErreur();
            break;
        case 'administrationConnexionErreurVide':
            administrationConnexionErreurVide();
            break;

        case 'administrationHome':
        case 'administrationChapitres':
        case 'administrationChapitresEcrire':
        case 'administrationChapitresModifier':
        case 'administrationChapitreModifierEnvoi':
        case 'administrationChapitreNouveau':
        case 'administrationChapitresSupprimer':
        case 'administrationChapitreTransformerBrouillon':
        case 'administrationChapitreTransformerSupprimer':
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
        case 'livre':
            livre();
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
        case 'administrationConnexionErreur':
        case 'administrationConnexionErreurVide':
            administrationHome();
            break;


        case 'administrationHome':

            administrationHome();
            break;

        case 'administrationChapitres':

            administrationChapitres();
            break;
            // nouveau chapitre
        case 'administrationChapitresEcrire':

            administrationChapitresEcrire();
            break;
            // modifier chapitre
        case 'administrationChapitresModifier':

            administrationChapitresModifier();
            break;
            // envoie du chapitre modifier 
        case 'administrationChapitreModifierEnvoi':

            administrationChapitresEnvoiModifier();
            break;
        case 'administrationChapitreNouveau':

            administrationChapitreNouveau();
            break;
            // transformer le chapitre en liste supprimer 
        case 'administrationChapitresSupprimer':

            administrationChapitresSupprimer();
            break;
        case 'administrationChapitreTransformerBrouillon':

            administrationChapitreTransformerBrouillon();
            break;
        case 'administrationChapitreTransformerSupprimer':

            administrationChapitreTransformerSupprimer();
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

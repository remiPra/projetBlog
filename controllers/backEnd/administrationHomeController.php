<?php 

require 'models/backEnd/commentManager.php';
require 'models/backEnd/contactManager.php';
$contact = new ContactManager();
$nbMessages = $contact->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
//Affichage de la page d'accueil de l'administration
require 'views/backEnd/administrationHomeView.php';

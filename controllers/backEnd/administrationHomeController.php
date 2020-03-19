<?php 

require 'models/backEnd/CommentManager.php';
require 'models/backEnd/contactManager.php';
$contact = new ContactManager();
$nbMessages = $contact->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();
//Affichage de la page d'accueil de l'administration
require 'views/backEnd/administrationHomeView.php';

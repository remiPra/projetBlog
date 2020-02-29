<?php

// Recuperation de tous les commentaires publiés et signalés


require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();





$nbComments = $commentaires->countCommentsNew();
$comments = $commentaires->getAllComments();
$commentsV = $commentaires->getAllCommentsValidate();
$commentsS = $commentaires->getAllCommentsSignaler();

// affichage de la partie administration des commentaires 
require 'views/backEnd/administrationCommentairesView.php';
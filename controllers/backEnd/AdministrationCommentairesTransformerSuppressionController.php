<?php
extract($_GET);
$id = strip_tags($id);
// Recuperation de tous les commentaires publiés et signalés

require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';


$contactManager = new ContactManager();
$commentaires = new Commentaires();


$commentsSuppression = $commentaires->supressionFinal($id);

$nbComments = $commentaires->countCommentsNew();
$nbMessages = $contactManager->countMessageNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();


$notification = 'le commentaire a été supprimé';
$comments = $commentaires->getAllComments();
$commentsV = $commentaires->getAllCommentsValidate();
$commentsS = $commentaires->getAllCommentsSignaler();
// affichage de la partie administration des commentaires 
require 'views/backEnd/administrationCommentairesView.php';
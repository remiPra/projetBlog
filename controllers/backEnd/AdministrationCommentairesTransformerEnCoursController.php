<?php
extract($_GET);
$id = strip_tags($id);
// Recuperation de tous les commentaires publiés et signalés

require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();




$commentsEnCours = $commentaires->changeCommentEnCours($id);
$notification = 'le commentaire a été placé dans les commentaires en cours';
$comments = $commentaires->getAllComments();
$commentsV = $commentaires->getAllCommentsValidate();
$commentsS = $commentaires->getAllCommentsSignaler();
// affichage de la partie administration des commentaires 
require 'views/backEnd/administrationCommentairesView.php';
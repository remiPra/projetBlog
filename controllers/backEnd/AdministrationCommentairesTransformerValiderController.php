<?php
extract($_GET);
$id = strip_tags($id);
// Recuperation de tous les commentaires publiés et signalés
require 'models/backEnd/commentManager.php';
require 'models/backEnd/contactManager.php';


$contactManager = new ContactManager();
$commentaires = new Commentaires();
$commentsSuppression = $commentaires->changeCommentValider($id);

$nbMessages = $contactManager->countMessageNew();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();



$notification = 'le commentaire a été validé';
$comments = $commentaires->getAllComments();
$commentsV = $commentaires->getAllCommentsValidate();
$commentsS = $commentaires->getAllCommentsSignaler();
// affichage de la partie administration des commentaires 
require 'views/backEnd/administrationCommentairesView.php';
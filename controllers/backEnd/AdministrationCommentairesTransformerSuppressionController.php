<?php
extract($_GET);
$id = strip_tags($id);
// Recuperation de tous les Comments publiés et signalés

require 'models/backEnd/contactManager.php';
require 'models/backEnd/CommentManager.php';


$contactManager = new ContactManager();
$Comments = new Comments();


$CommentsSuppression = $Comments->supressionFinal($id);

$nbComments = $Comments->countCommentsNew();
$nbMessages = $contactManager->countMessageNew();
$nbCommentsDanger = $Comments->countCommentsDanger();


$notification = 'le Comment a été supprimé';
$Comments = $Comments->getAllComments();
$CommentsV = $Comments->getAllCommentsValidate();
$CommentsS = $Comments->getAllCommentsSignaler();
// affichage de la partie administration des Comments 
require 'views/backEnd/administrationCommentsView.php';
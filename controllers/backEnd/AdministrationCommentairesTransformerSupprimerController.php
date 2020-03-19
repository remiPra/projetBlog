<?php
extract($_GET);
$id = strip_tags($id);
// Recuperation de tous les Comments publiés et signalés
require 'models/backEnd/CommentManager.php';

require 'models/backEnd/contactManager.php';


$contactManager = new ContactManager();
$Comments = new Comments();
$CommentsSuppression = $Comments->changeCommentSignaler($id);

$nbMessages = $contactManager->countMessageNew();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();



$notification = 'le Comment a été placé dans les Commentares supprimés';
$Comments = $Comments->getAllComments();
$CommentsV = $Comments->getAllCommentsValidate();
$CommentsS = $Comments->getAllCommentsSignaler();
// affichage de la partie administration des Comments 
require 'views/backEnd/administrationCommentsView.php';
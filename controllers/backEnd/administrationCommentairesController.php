<?php

// Recuperation de tous les Comments publiés et signalés


require 'models/backEnd/contactManager.php';
require 'models/backEnd/CommentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();






$Comments = $Comments->getAllComments();
$CommentsV = $Comments->getAllCommentsValidate();
$CommentsS = $Comments->getAllCommentsSignaler();

// affichage de la partie administration des Comments 
require 'views/backEnd/administrationCommentsView.php';
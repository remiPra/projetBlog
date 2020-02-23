<?php

// Recuperation de tous les commentaires publiés et signalés
require 'models/backEnd/commentManager.php';
$comments = getAllComments();
$commentsV = getAllCommentsValidate();
$commentsS = getAllCommentsSignaler();

// affichage de la partie administration des commentaires 
require 'views/backEnd/administrationCommentairesView.php';